<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskType extends Model
{
    use HasFactory;

    protected $table = 'risk_type_table';
    protected $guarded = [];
    public $timestamps = false;


    
}
