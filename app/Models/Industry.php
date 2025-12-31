<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $table = 'hr_industry_table';

    protected $fillable = [
        'industry_id',
        'industry_name',
        'sector',
    ];
    
    // Disable timestamps
    public $timestamps = false;
}