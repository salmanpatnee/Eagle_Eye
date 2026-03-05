# SSO Integration Plan — Signed Token Handoff

**Date:** 2026-02-27
**Method:** JWT-based Signed Token Handoff
**Our Stack:** Laravel 11 (eurociso)
**External:** Client's platform (separate database, separate server)

---

## Overview

When a user on the client's platform clicks a link, they should be automatically logged into our application without entering credentials. This is achieved by having the client's system generate a cryptographically signed JWT token containing the user's identity. Our Laravel application verifies the token and creates a session.

---

## How It Works (Simple Flow)

```
1. User is logged into client's platform
2. User clicks "Access EuroCISO" link
3. Client's server generates a signed JWT token with user info + expiry
4. User is redirected to: https://eurociso.test/sso/login?token=<JWT>
5. Our Laravel app verifies the token signature, expiry, and uniqueness
6. Laravel finds the user in our database by email
7. Laravel logs the user in and redirects to the dashboard
```

---

## What the Client Needs to Do

### Step 1 — Share User Information
Confirm what user data will be included in the token:
- `email` — must match a user record in our database
- `name` — optional, for display purposes
- Any roles or identifiers relevant to access control

### Step 2 — Agree on a Shared Secret Key
- We will generate a long, random secret key (256-bit minimum)
- This key is shared **once**, privately and securely (not via email in plain text)
- Both systems store it in their environment configuration — never hardcoded in code
- This key is used to sign and verify the JWT

### Step 3 — Generate a Signed JWT on Link Click
When the user clicks the link, their server must:

1. Build a JWT payload:
   ```json
   {
     "email": "user@example.com",
     "name": "John Doe",
     "iat": 1709030400,
     "exp": 1709030700,
     "jti": "unique-random-uuid"
   }
   ```
   - `iat` — issued at (Unix timestamp)
   - `exp` — expiry (issued at + 300 seconds max, ideally 60 seconds)
   - `jti` — unique ID per token (UUID or random string) to prevent reuse

2. Sign the JWT using **HS256** algorithm with the shared secret key

3. Redirect the user to:
   ```
   https://eurociso.test/sso/login?token=<signed_jwt>
   ```

### Step 4 — Provision Users in Our System
- Before go-live, we need a list of all users who should have access
- Each user must exist in our database with a matching email address
- Either we import them, or we agree on a JIT (just-in-time) provisioning strategy

### Libraries the Client Can Use to Generate JWT
| Language | Library |
|---|---|
| PHP | `firebase/php-jwt` |
| Node.js | `jsonwebtoken` |
| Python | `PyJWT` |
| Java | `java-jwt` (Auth0) |
| C# / .NET | `System.IdentityModel.Tokens.Jwt` |

---

## What We Need to Do (Laravel Implementation)

### Step 1 — Install JWT Package
```bash
composer require firebase/php-jwt
```

### Step 2 — Add Secret Key to Environment
In `.env`:
```
SSO_SECRET_KEY=<shared_secret_key_here>
SSO_TOKEN_TTL=300
```

In `config/services.php`, add:
```php
'sso' => [
    'secret' => env('SSO_SECRET_KEY'),
    'ttl'    => env('SSO_TOKEN_TTL', 300),
],
```

### Step 3 — Create the SSO Controller
```bash
php artisan make:controller Auth/SsoController --no-interaction
```

The controller will:
1. Extract the token from the URL query string
2. Decode and verify the JWT signature using the shared secret
3. Check that the token has not expired (`exp` claim)
4. Check that the `jti` (unique ID) has not been used before — store used JTIs in cache with TTL
5. Find the user in our database by `email`
6. Log the user in using `Auth::login()`
7. Redirect to the intended protected route

### Step 4 — Create the SSO Route
In `routes/web.php`:
```
GET /sso/login  → Auth\SsoController@login
```
This route must be:
- **Accessible without authentication** (excluded from auth middleware)
- **Rate limited** to prevent brute-force token guessing

### Step 5 — Replay Attack Prevention
Used `jti` values must be stored temporarily to prevent reuse:
- Use Laravel Cache with a TTL matching the token expiry window
- If a `jti` is seen twice, reject the request with `403 Forbidden`

### Step 6 — Error Handling
The controller must handle and log:
- Invalid signature → `403 Forbidden`
- Expired token → `403 Forbidden`
- Replayed token (duplicate `jti`) → `403 Forbidden`
- User not found in our database → `404` or redirect to an error page
- Malformed token → `400 Bad Request`

### Step 7 — Write Tests
Feature tests covering:
- Valid token → user logged in and redirected
- Expired token → rejected
- Invalid signature → rejected
- Replayed token → rejected
- Unknown user email → rejected

---

## Security Checklist

| # | Requirement | Responsibility |
|---|---|---|
| 1 | Tokens expire within 60–300 seconds | Client |
| 2 | Each token has a unique `jti` | Client |
| 3 | Shared secret stored in env only, never in code | Both |
| 4 | HTTPS enforced on both sides | Both |
| 5 | Used `jti` values rejected (replay prevention) | Us |
| 6 | Signature verified before trusting any payload | Us |
| 7 | Rate limiting on the SSO endpoint | Us |
| 8 | All failures are logged | Us |

---

## Pre-Go-Live Checklist

- [ ] Shared secret key exchanged securely
- [ ] Client has tested JWT generation and signing
- [ ] Test user accounts exist in our database
- [ ] End-to-end test performed in staging environment
- [ ] Error pages/messages reviewed
- [ ] Rate limiting configured
- [ ] Logging verified
- [ ] HTTPS confirmed on both environments

---

## Questions to Confirm With Client

1. What programming language/framework does your platform use?
2. Can you generate and sign JWTs with HS256?
3. What user identifier will you send — email address or a custom ID?
4. Do you want us to auto-create users who don't exist yet (JIT provisioning), or should all users be pre-registered?
5. What URL should we redirect the user to after successful login?
6. What URL should we redirect to on failure?

---

## Timeline Estimate

| Phase | Task |
|---|---|
| Phase 1 | Exchange requirements, answer open questions |
| Phase 2 | Client implements JWT generation; we implement Laravel endpoint |
| Phase 3 | Staging integration test |
| Phase 4 | Production go-live |
