<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'role_id',
        'must_change_password',
        'payment_expires_at',
        'payment_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'payment_expires_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'role_id', 'id');
    }

    public function userPayments(): HasMany
    {
        return $this->hasMany(UserPayment::class);
    }

    public function hasActivePayment(): bool
    {
        return $this->payment_expires_at !== null && $this->payment_expires_at->isFuture();
    }

    /**
     * Get the user's must_change_password status.
     *
     * @param  string|null  $value
     * @return bool
     */
    public function getMustChangePasswordAttribute($value)
    {
        return (bool) $value;
    }
}
