<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskInherent extends Model
{
    use HasFactory;

    protected $table = 'risk_inherent_table';
    protected $guarded = [];
    public $timestamps = false;

    public function riskAppetite()
    {
        return $this->belongsTo(RiskAppetite::class, 'risk_appetite_id', 'risk_appetite_id');
    }
}
