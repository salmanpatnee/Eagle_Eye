<?php

namespace Tests\Feature;

use App\Mail\UserCredentialsMail;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Tests\TestCase;

class PaymentControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_pricing_page_loads(): void
    {
        $response = $this->get('/pricing');

        $response->assertStatus(200);
        $response->assertViewIs('payment.pricing');
    }

    public function test_pricing_page_is_accessible_without_authentication(): void
    {
        $response = $this->get('/pricing');

        $response->assertStatus(200);
    }

    public function test_paypal_create_redirects_to_paypal(): void
    {
        $mock = Mockery::mock(PayPalClient::class);
        $mock->shouldReceive('setApiCredentials')->once();
        $mock->shouldReceive('getAccessToken')->once();
        $mock->shouldReceive('createOrder')->once()->andReturn([
            'id' => 'ORDER-123',
            'status' => 'CREATED',
            'links' => [
                ['rel' => 'approve', 'href' => 'https://sandbox.paypal.com/approve?token=ORDER-123'],
            ],
        ]);
        $this->app->instance(PayPalClient::class, $mock);

        $response = $this->post('/payment/paypal/create', [], ['X-CSRF-TOKEN' => csrf_token()]);

        $response->assertRedirect('https://sandbox.paypal.com/approve?token=ORDER-123');
    }

    public function test_paypal_create_redirects_to_pricing_on_failure(): void
    {
        $mock = Mockery::mock(PayPalClient::class);
        $mock->shouldReceive('setApiCredentials')->once();
        $mock->shouldReceive('getAccessToken')->once();
        $mock->shouldReceive('createOrder')->once()->andReturn([
            'id' => 'ORDER-123',
            'status' => 'FAILED',
            'links' => [],
        ]);
        $this->app->instance(PayPalClient::class, $mock);

        $response = $this->post('/payment/paypal/create');

        $response->assertRedirect(route('payment.pricing'));
        $response->assertSessionHas('error');
    }

    public function test_success_creates_new_user_and_payment_record(): void
    {
        Mail::fake();

        $payerEmail = 'newpaypaluser'.time().'@example.com';

        $this->mockPayPalCapture($payerEmail);

        $response = $this->get('/payment/paypal/success?token=ORDER-ABC&PayerID=PAYER-123');

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'email' => $payerEmail,
            'role_id' => 4,
            'payment_status' => 'active',
        ]);

        $user = User::query()->where('email', $payerEmail)->first();

        $this->assertNotNull($user->payment_expires_at);
        $this->assertTrue($user->payment_expires_at->isFuture());

        $this->assertDatabaseHas('user_payments', [
            'user_id' => $user->id,
            'paypal_order_id' => 'ORDER-ABC',
            'payer_email' => $payerEmail,
            'status' => 'completed',
        ]);

        Mail::assertSent(UserCredentialsMail::class, fn ($mail) => $mail->hasTo($payerEmail));
    }

    public function test_success_updates_existing_user_payment(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'role_id' => 4,
            'payment_status' => null,
            'payment_expires_at' => null,
        ]);

        $this->mockPayPalCapture($user->email);

        $response = $this->get('/payment/paypal/success?token=ORDER-XYZ&PayerID=PAYER-456');

        $response->assertRedirect(route('login'));

        $user->refresh();
        $this->assertEquals('active', $user->payment_status);
        $this->assertTrue($user->payment_expires_at->isFuture());

        Mail::assertNotSent(UserCredentialsMail::class);
    }

    public function test_success_sends_credentials_email_only_for_new_users(): void
    {
        Mail::fake();

        $payerEmail = 'brandnewuser'.time().'@example.com';
        $this->mockPayPalCapture($payerEmail);

        $this->get('/payment/paypal/success?token=ORDER-NEW&PayerID=PAYER-NEW');

        Mail::assertSent(UserCredentialsMail::class);
    }

    public function test_success_requires_token_param(): void
    {
        $response = $this->get('/payment/paypal/success?PayerID=PAYER-123');

        $response->assertRedirect();
    }

    public function test_success_requires_payer_id_param(): void
    {
        $response = $this->get('/payment/paypal/success?token=ORDER-123');

        $response->assertRedirect();
    }

    public function test_cancel_redirects_to_pricing(): void
    {
        $response = $this->get('/payment/paypal/cancel');

        $response->assertRedirect(route('payment.pricing'));
        $response->assertSessionHas('error');
    }

    public function test_payment_access_middleware_allows_superadmin(): void
    {
        $superAdmin = User::query()->find(1);

        if (! $superAdmin) {
            $this->markTestSkipped('Superadmin user (id=1) not found in database.');
        }

        // Superadmin (id=1) bypasses payment check — should not be redirected to pricing
        $response = $this->actingAs($superAdmin)->get('/profile/edit');

        $response->assertStatus(200);
    }

    public function test_payment_access_middleware_allows_admin_role(): void
    {
        $admin = User::factory()->create([
            'role_id' => 1,
            'payment_expires_at' => null,
        ]);

        // Admin (role_id=1) bypasses payment check — should not be redirected to pricing
        $response = $this->actingAs($admin)->get('/profile/edit');

        $response->assertStatus(200);
    }

    public function test_payment_access_middleware_blocks_user_without_payment(): void
    {
        $user = User::factory()->create([
            'role_id' => 4,
            'payment_expires_at' => null,
            'payment_status' => null,
        ]);

        $response = $this->actingAs($user)->get('/profile/edit');

        $response->assertRedirect(route('payment.pricing'));
    }

    public function test_payment_access_middleware_blocks_user_with_expired_payment(): void
    {
        $user = User::factory()->create([
            'role_id' => 4,
            'payment_expires_at' => now()->subDay(),
            'payment_status' => 'active',
        ]);

        $response = $this->actingAs($user)->get('/profile/edit');

        $response->assertRedirect(route('payment.pricing'));
    }

    public function test_payment_access_middleware_allows_user_with_active_payment(): void
    {
        $user = User::factory()->create([
            'role_id' => 4,
            'payment_expires_at' => now()->addYear(),
            'payment_status' => 'active',
        ]);

        $response = $this->actingAs($user)->get('/profile/edit');

        $response->assertStatus(200);
    }

    public function test_has_active_payment_returns_true_for_future_expiry(): void
    {
        $user = User::factory()->make([
            'payment_expires_at' => now()->addYear(),
        ]);

        $this->assertTrue($user->hasActivePayment());
    }

    public function test_has_active_payment_returns_false_for_past_expiry(): void
    {
        $user = User::factory()->make([
            'payment_expires_at' => now()->subDay(),
        ]);

        $this->assertFalse($user->hasActivePayment());
    }

    public function test_has_active_payment_returns_false_when_null(): void
    {
        $user = User::factory()->make([
            'payment_expires_at' => null,
        ]);

        $this->assertFalse($user->hasActivePayment());
    }

    private function mockPayPalCapture(string $payerEmail): void
    {
        $mock = Mockery::mock(PayPalClient::class);
        $mock->shouldReceive('setApiCredentials');
        $mock->shouldReceive('getAccessToken');
        $mock->shouldReceive('capturePaymentOrder')->andReturn([
            'status' => 'COMPLETED',
            'payer' => [
                'email_address' => $payerEmail,
                'name' => [
                    'given_name' => 'Test',
                    'surname' => 'User',
                ],
            ],
            'purchase_units' => [
                [
                    'payments' => [
                        'captures' => [
                            [
                                'id' => 'CAPTURE-123',
                                'amount' => [
                                    'value' => '99.00',
                                    'currency_code' => 'USD',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
        $this->app->instance(PayPalClient::class, $mock);
    }
}
