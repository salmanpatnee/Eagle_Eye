<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyPerformanceIndicator extends Model
{
    use HasFactory;

    protected $table = 'risk_kpi_table';
    protected $guarded = [];
    public $timestamps = false;


    
}
