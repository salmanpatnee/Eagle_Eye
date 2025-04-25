<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskSubType extends Model
{
    use HasFactory;

    protected $table = 'risk_sub_type_table';
    protected $guarded = [];
    public $timestamps = false;

    public function type() {
        return $this->belongsTo(RiskType::class, 'risk_type_id', 'risk_type_id');
    }


    
}
