# PayPal Payment Integration Plan

## Context
The EURO CISO application has no payment system. Non-admin users need to pay for access (1-year subscription via PayPal). After payment, the system automatically creates a user account and emails credentials. Admin (role_id=1) and SuperAdmin (id=1) bypass all payment checks.

---

## Tools, Agents & MCPs to Use During Implementation

### Laravel Boost MCP (always prefer these over guessing)
- `search-docs` — Search version-specific Laravel docs before writing any new code
- `list-artisan-commands` — Verify command options before running `php artisan make:*`
- `tinker` — Debug PayPal API responses, verify user creation, inspect model state
- `database-query` — Inspect `users` and `user_payments` tables after migrations
- `browser-logs` — Check browser console errors when testing the PayPal redirect flow
- `get-absolute-url` — Generate correct URLs to share with the user for testing

### Agents
- `Explore` agent — Re-explore specific files if implementation reveals unexpected code patterns
- `laravel-simplifier` skill — Run after completing each major file to clean up and simplify the code

### Skills
- `/simplify` — After all code is written, use the `simplify` skill to review changed files for quality and efficiency

---

## Architecture Overview

**Payment Flow:**
1. Visitor opens `/pricing` → sees plan details + "Pay with PayPal" button
2. POST `/payment/paypal/create` → creates PayPal order → redirects user to PayPal
3. PayPal redirects to `/payment/paypal/success?token=XXX&PayerID=XXX`
4. Server captures payment → extracts payer email → creates/updates user → sends credentials email → redirects to `/login` with flash message

**Access Control:**
- `CheckPaymentAccess` middleware applied to all `auth` route groups
- Skips check for admin (role_id=1) and superadmin (id=1)
- Redirects to `/pricing` if `payment_expires_at` is null or expired

---

## Step-by-Step Implementation

### 1. Install PayPal Package
```
composer require srmklive/paypal:~3.0
php artisan vendor:publish --provider="Srmklive\PayPal\Providers\PayPalServiceProvider"
```

### 2. Environment Variables (add to .env)
```
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID=your_sandbox_client_id
PAYPAL_SANDBOX_CLIENT_SECRET=your_sandbox_client_secret
PAYPAL_CURRENCY=USD
PAYPAL_PRICE=99.00
```

### 3. Database Migrations

**Migration A** — Add payment columns to `users` table:
```
php artisan make:migration add_payment_fields_to_users_table --table=users
```
Columns: `payment_expires_at` (nullable datetime), `payment_status` (nullable string)

**Migration B** — Create `user_payments` table:
```
php artisan make:migration create_user_payments_table
```
Columns: `id`, `user_id` (FK→users), `paypal_order_id`, `paypal_capture_id`, `payer_email`, `amount` (decimal 10,2), `currency`, `status`, `paid_at` (datetime), `expires_at` (datetime), `timestamps`

### 4. Model: `UserPayment`
```
php artisan make:model UserPayment
```
- File: `app/Models/UserPayment.php`
- Fillable: all payment columns
- Relationship: `belongsTo(User::class)`

### 5. Update `User` Model
- File: `app/Models/User.php`
- Add to `$fillable`: `payment_expires_at`, `payment_status`
- Add cast: `'payment_expires_at' => 'datetime'`
- Add relationship: `userPayments()` → `hasMany(UserPayment::class)`
- Add helper: `hasActivePayment(): bool` — checks `payment_expires_at` not null and > now

### 6. Mail: `UserCredentialsMail`
```
php artisan make:mail UserCredentialsMail --markdown=mail.user-credentials
```
- File: `app/Mail/UserCredentialsMail.php`
- Constructor: `public function __construct(public User $user, public string $plainPassword) {}`
- View: `resources/views/mail/user-credentials.blade.php`
- Subject: "Your EURO CISO Login Credentials"

### 7. Middleware: `CheckPaymentAccess`
```
php artisan make:middleware CheckPaymentAccess
```
- File: `app/Http/Middleware/CheckPaymentAccess.php`
- Logic:
  1. Pass through if not authenticated (handled by `auth` middleware first)
  2. Pass through if `auth()->user()->id === 1` (superadmin)
  3. Pass through if `auth()->user()->role_id === 1` (admin)
  4. Check `auth()->user()->hasActivePayment()` → if false, redirect to `route('payment.pricing')` with error: "Your subscription has expired or payment is required."
- Register in `app/Http/Kernel.php` under `$middlewareAliases` as `'payment.access'`

### 8. Controller: `PaymentController`
```
php artisan make:controller PaymentController
```
- File: `app/Http/Controllers/PaymentController.php`

**Methods:**

`pricing()` — returns view `payment.pricing`

`create(Request $request)` — no auth required
- Validate: none needed (PayPal captures email)
- Build PayPal order via `srmklive/paypal`
- Set return_url = `route('payment.paypal.success')`, cancel_url = `route('payment.paypal.cancel')`
- Store `paypal_order_id` in session
- Redirect to PayPal approval link

`success(Request $request)` — no auth required
- Validate `token` and `PayerID` query params
- Capture payment via PayPal API
- Extract `payer_email` and `capture_id` from response
- Check if user exists by email:
  - **New user**: `User::create()` with email as username, email, `Str::random(12)` as plain password, `role_id=4`, `must_change_password=true`
  - **Existing user**: retrieve and extend their access
- Update user: `payment_expires_at = now()->addYear()`, `payment_status = 'active'`
- Create `UserPayment` record
- Send `UserCredentialsMail` (only for new users)
- Redirect to `route('login')` with session flash: "Payment successful. Please check your inbox for your login credentials."

`cancel()` — redirect to `route('payment.pricing')` with error message

### 9. Routes (`routes/web.php`)

Add to public routes (no middleware):
```php
Route::get('/pricing', [PaymentController::class, 'pricing'])->name('payment.pricing');
Route::post('/payment/paypal/create', [PaymentController::class, 'create'])->name('payment.paypal.create');
Route::get('/payment/paypal/success', [PaymentController::class, 'success'])->name('payment.paypal.success');
Route::get('/payment/paypal/cancel', [PaymentController::class, 'cancel'])->name('payment.paypal.cancel');
```

Modify existing route groups — add `'payment.access'` middleware:
```php
Route::middleware(['auth', 'payment.access'])->group(...)
Route::middleware(['auth', 'must.change.password', 'payment.access'])->group(...)
```

### 10. Views

**`resources/views/payment/pricing.blade.php`**
- Simple public layout (standalone, no auth sidebar)
- Plan name, description, price, 1-year validity
- "Pay with PayPal" button → POST to `route('payment.paypal.create')`
- CSRF token included

**`resources/views/mail/user-credentials.blade.php`** (markdown mail)
- Welcome message
- Email (username) and generated password
- Login URL
- Note to change password after first login

### 11. Admin Visibility
- File: `resources/views/process/initial-setup/users/index.blade.php`
  - Add columns: Payment Date, Expires On, Status
  - Show payment_status as badge (green=Active, red=Expired, gray=None)

- File: `resources/views/process/initial-setup/users/show.blade.php`
  - Add info row for payment details: paid_at, expires_at, status

### 12. Mail Configuration
Configure SMTP in `.env` (user must provide mail credentials):
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS=noreply@eurociso.com
MAIL_FROM_NAME="EURO CISO"
```

### 13. Tests
```
php artisan make:test PaymentControllerTest
```
Test cases:
- Pricing page loads (200 status)
- PayPal create redirects to PayPal URL
- Success callback creates new user + UserPayment record
- Success callback for existing user updates payment fields
- Success callback sends credentials email
- Success callback redirects to login with flash message
- Cancel redirects to pricing page
- `CheckPaymentAccess` allows admin users through
- `CheckPaymentAccess` blocks users without payment
- `CheckPaymentAccess` blocks users with expired payment

### 14. Run Pint
```
vendor/bin/pint --dirty
```

---

## Critical Files

| File | Action |
|------|--------|
| `app/Models/User.php` | Add fillable fields, relationship, `hasActivePayment()` |
| `app/Models/UserPayment.php` | **Create** |
| `app/Http/Controllers/PaymentController.php` | **Create** |
| `app/Http/Middleware/CheckPaymentAccess.php` | **Create** |
| `app/Http/Kernel.php` | Register `payment.access` alias |
| `app/Mail/UserCredentialsMail.php` | **Create** |
| `routes/web.php` | Add payment routes, add middleware to groups |
| `resources/views/payment/pricing.blade.php` | **Create** |
| `resources/views/mail/user-credentials.blade.php` | **Create** |
| `resources/views/process/initial-setup/users/index.blade.php` | Add payment columns |
| `resources/views/process/initial-setup/users/show.blade.php` | Add payment info rows |
| `database/migrations/..._add_payment_fields_to_users_table.php` | **Create** |
| `database/migrations/..._create_user_payments_table.php` | **Create** |
| `.env` | Add PayPal + Mail config |

---

## Verification

1. Visit `/pricing` → see pricing page, verify no auth required
2. Click "Pay with PayPal" → confirm redirect to PayPal Sandbox approval page
3. Approve payment in sandbox → confirm redirect to `/login` with flash message
4. Check email (Mailtrap) → confirm credentials email received
5. Log in with credentials → confirm access to protected pages
6. Log in as admin (role_id=1) → confirm no payment check, full access
7. Log in as user with expired `payment_expires_at` → confirm redirect to `/pricing`
8. Check admin users view → confirm payment date/expiry/status columns visible
9. Run: `php artisan test tests/Feature/PaymentControllerTest.php`