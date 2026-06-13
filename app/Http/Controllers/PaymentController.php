<?php

namespace App\Http\Controllers;

use App\Mail\UserCredentialsMail;
use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function pricing(): View
    {
        return view('payment.pricing');
    }

    public function create(Request $request): RedirectResponse
    {
        $provider = app(PayPalClient::class);
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $price = config('paypal.price', '99.00');
        $currency = config('paypal.currency', 'USD');

        $order = $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => $currency,
                        'value' => $price,
                    ],
                    'description' => 'UK CISO 1-Year Subscription',
                ],
            ],
            'application_context' => [
                'return_url' => route('payment.paypal.success'),
                'cancel_url' => route('payment.paypal.cancel'),
                'landing_page' => 'BILLING',         // ← show card form, not PayPal login
                'shipping_preference' => 'NO_SHIPPING',
                'user_action' => 'PAY_NOW',
            ],
        ]);

        if (isset($order['id']) && $order['status'] === 'CREATED') {
            $request->session()->put('paypal_order_id', $order['id']);

            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('payment.pricing')
            ->with('error', 'Unable to initiate PayPal payment. Please try again.');
    }

    public function success(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required', 'string'],
            'PayerID' => ['required', 'string'],
        ]);

        $provider = app(PayPalClient::class);
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $orderId = $request->query('token');
        $response = $provider->capturePaymentOrder($orderId);

        if (! isset($response['status']) || $response['status'] !== 'COMPLETED') {
            return redirect()->route('payment.pricing')
                ->with('error', 'Payment could not be completed. Please try again.');
        }

        $capture = $response['purchase_units'][0]['payments']['captures'][0];
        $captureId = $capture['id'];
        $amount = $capture['amount']['value'];
        $currency = $capture['amount']['currency_code'];
        $payerEmail = $response['payer']['email_address'];
        $payerFirstName = $response['payer']['name']['given_name'] ?? '';
        $payerLastName = $response['payer']['name']['surname'] ?? '';

        $existingUser = User::query()->where('email', $payerEmail)->first();
        $isNewUser = $existingUser === null;
        $plainPassword = null;

        if ($isNewUser) {
            $plainPassword = Str::random(12);
            $user = User::query()->create([
                'first_name' => $payerFirstName,
                'last_name' => $payerLastName,
                'username' => $payerEmail,
                'email' => $payerEmail,
                'password' => $plainPassword,
                'role_id' => 4,
                'must_change_password' => true,
                'payment_expires_at' => now()->addYear(),
                'payment_status' => 'active',
            ]);
        } else {
            $user = $existingUser;
            $user->update([
                'payment_expires_at' => now()->addYear(),
                'payment_status' => 'active',
            ]);
        }

        UserPayment::query()->create([
            'user_id' => $user->id,
            'paypal_order_id' => $orderId,
            'paypal_capture_id' => $captureId,
            'payer_email' => $payerEmail,
            'amount' => $amount,
            'currency' => $currency,
            'status' => 'completed',
            'paid_at' => now(),
            'expires_at' => now()->addYear(),
        ]);

        if ($isNewUser) {
            Mail::to($user->email)->send(new UserCredentialsMail($user, $plainPassword));
        }

        return redirect()->route('login')
            ->with('success', 'Payment successful. Please check your inbox for your login credentials.');
    }

    public function cancel(): RedirectResponse
    {
        return redirect()->route('payment.pricing')
            ->with('error', 'Payment was cancelled. Please try again.');
    }
}
