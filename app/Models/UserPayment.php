<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPayment extends Model
{
    /** @use HasFactory<\Database\Factories\UserPaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paypal_order_id',
        'paypal_capture_id',
        'payer_email',
        'amount',
        'currency',
        'status',
        'paid_at',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'paid_at' => 'datetime',
            'expires_at' => 'datetime',
            'amount' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
