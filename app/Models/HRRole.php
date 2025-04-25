<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HRRole extends Model
{
    use HasFactory;

    protected $table = 'hr_roles_table';

    protected $guarded = [];

    public $timestamps = false;
}
