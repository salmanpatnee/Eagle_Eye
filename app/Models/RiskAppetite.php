<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RiskAppetite extends Model
{
    use HasFactory;

    protected $table = 'risk_appetite_table';
    protected $guarded = [];
    public $timestamps = false;

    public function getRiskAppetiteColorAttribute($value)
    {
        return Str::slug($value);
    }
}
