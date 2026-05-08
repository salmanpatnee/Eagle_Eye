<?php

namespace App\Services;

use App\Exceptions\Ldap\LdapAuthFailedException;
use App\Exceptions\Ldap\LdapConnectionException;
use App\Exceptions\Ldap\LdapGroupNotFoundException;
use App\Exceptions\Ldap\LdapUserNotFoundException;
use App\Models\User;
use LdapRecord\Container;
use Throwable;

class LdapAuthService
{
    public function authenticate(string $username, string $password): User
    {
        try {
            $connection = Container::getDefaultConnection();
            $attr = config('ldap.username_attribute', 'samaccountname');
            $results = $connection->query()
                ->whereEquals($attr, $username)
                ->select(['*', '+']) // '+' fetches operational attrs (memberOf, entryUUID)
                ->first();
        } catch (Throwable $e) {
            throw new LdapConnectionException('LDAP server unreachable.', 0, $e);
        }

        if (! $results) {
            throw new LdapUserNotFoundException("User [{$username}] not found in directory.");
        }

        $userDn = $results['dn'];

        try {
            $authenticated = $connection->auth()->attempt($userDn, $password);
        } catch (Throwable $e) {
            throw new LdapConnectionException('LDAP authentication bind failed.', 0, $e);
        }

        if (! $authenticated) {
            throw new LdapAuthFailedException("Invalid credentials for [{$username}].");
        }

        $memberOf = $this->extractMemberOf($results);
        $roleId = $this->resolveRoleFromGroups($memberOf);

        return $this->syncUser($username, $results, $roleId);
    }

    private function extractMemberOf(array $entry): array
    {
        $raw = $entry['memberof'] ?? [];

        if (is_string($raw)) {
            return [$raw];
        }

        // LdapRecord returns attribute values as arrays; filter out the 'count' key
        return array_filter($raw, fn ($v) => is_string($v));
    }

    private function resolveRoleFromGroups(array $memberOf): int
    {
        $groupMap = config('ldap_groups', []);

        foreach ($groupMap as $groupDn => $roleId) {
            if (! $groupDn) {
                continue;
            }

            foreach ($memberOf as $dn) {
                if (strcasecmp(trim($dn), trim($groupDn)) === 0) {
                    return (int) $roleId;
                }
            }
        }

        throw new LdapGroupNotFoundException('No mapped AD group found for this user.');
    }

    private function syncUser(string $username, array $ldapEntry, int $roleId): User
    {
        $guid = $this->extractGuid($ldapEntry);
        $domain = $this->extractDomainFromDn($ldapEntry['dn'] ?? '');

        $firstName = $ldapEntry['givenname'][0] ?? $username;
        $lastName = $ldapEntry['sn'][0] ?? '';
        $email = $ldapEntry['mail'][0] ?? "{$username}@{$domain}";

        $user = User::where('username', $username)
            ->orWhere(fn ($q) => $guid ? $q->where('guid', $guid) : $q->whereRaw('0'))
            ->first();

        if ($user) {
            $user->update([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'role_id' => $roleId,
                'guid' => $guid,
                'domain' => $domain,
                'is_active' => 1,
            ]);
        } else {
            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'username' => $username,
                'email' => $email,
                'password' => bin2hex(random_bytes(32)),
                'role_id' => $roleId,
                'guid' => $guid,
                'domain' => $domain,
                'is_active' => 1,
            ]);
        }

        return $user->fresh();
    }

    private function extractGuid(array $entry): ?string
    {
        // AD objectGUID (binary) or OpenLDAP entryUUID (string)
        $raw = $entry['entryuuid'][0] ?? $entry['objectguid'][0] ?? null;

        if (! $raw) {
            return null;
        }

        // If it looks like binary (not printable ASCII), hex-encode it
        if (! mb_check_encoding($raw, 'ASCII') || preg_match('/[^\x20-\x7E]/', $raw)) {
            return bin2hex($raw);
        }

        return $raw;
    }

    private function extractDomainFromDn(string $dn): ?string
    {
        if (preg_match_all('/DC=([^,]+)/i', $dn, $matches)) {
            return implode('.', $matches[1]);
        }

        return null;
    }
}
