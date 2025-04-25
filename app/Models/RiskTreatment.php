<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskTreatment extends Model
{
    use HasFactory;

    protected $table = 'risk_treatment_options_table';
    protected $guarded = [];
    public $timestamps = false;


    
}
