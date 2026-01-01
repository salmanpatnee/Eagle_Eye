<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hr_designation_table';

    protected $fillable = [
        'designation_id',
        'designation_name'
    ];

    public $timestamps = false;
}
