<?php

namespace App\Http\Controllers;

use App\Exceptions\Ldap\LdapAuthFailedException;
use App\Exceptions\Ldap\LdapConnectionException;
use App\Exceptions\Ldap\LdapGroupNotFoundException;
use App\Exceptions\Ldap\LdapUserNotFoundException;
use App\Models\User;
use App\Services\LdapAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct(private LdapAuthService $ldap) {}

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $localUser = User::where('username', $attributes['username'])->first();

        // Local admin fallback — only user id=1 with no domain may use password auth
        if ($localUser && is_null($localUser->domain) && $localUser->id === 1) {
            if (! Auth::attempt($attributes)) {
                throw ValidationException::withMessages([
                    'username' => 'Your provided credentials could not be verified.',
                ]);
            }

            session()->regenerate();

            return redirect(route('org-status.index'))->with('success', 'Welcome Back!');
        }

        // Block existing local (non-admin) accounts that have no domain — only when LDAP is active
        if (config('app.ldap_enabled', env('LDAP_ENABLED', false)) && $localUser && is_null($localUser->domain)) {
            throw ValidationException::withMessages([
                'username' => 'Local accounts are disabled. Please use your Active Directory credentials.',
            ]);
        }

        // LDAP authentication
        if (config('app.ldap_enabled', env('LDAP_ENABLED', false))) {
            return $this->authenticateViaLdap($attributes['username'], $attributes['password']);
        }

        // Dev / LDAP-disabled fallback
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Your provided credentials could not be verified.',
            ]);
        }

        session()->regenerate();

        return redirect(route('org-status.index'))->with('success', 'Welcome Back!');
    }

    private function authenticateViaLdap(string $username, string $password)
    {
        try {
            $user = $this->ldap->authenticate($username, $password);
        } catch (LdapGroupNotFoundException) {
            throw ValidationException::withMessages([
                'username' => 'Your account has no assigned role. Contact your administrator.',
            ]);
        } catch (LdapConnectionException) {
            throw ValidationException::withMessages([
                'username' => 'Directory service unavailable. Contact your administrator.',
            ]);
        } catch (LdapUserNotFoundException|LdapAuthFailedException) {
            throw ValidationException::withMessages([
                'username' => 'Your provided credentials could not be verified.',
            ]);
        }

        Auth::login($user);
        session()->regenerate();

        return redirect(route('org-status.index'))->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
