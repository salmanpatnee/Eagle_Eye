<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPTExpert extends Model
{
    use HasFactory;

    protected $table = 'tpt_experties_table';
    protected $guarded = [];
    public $timestamps = false;

}
