<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlType extends Model
{
    use HasFactory;

    protected $table = 'control_type_table';
    public $timestamps = false;
    protected $guarded = [];
}
