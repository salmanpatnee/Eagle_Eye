<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyRiskIndicator extends Model
{
    use HasFactory;

    protected $table = 'risk_kri_table';
    protected $guarded = [];
    public $timestamps = false;


    
}
