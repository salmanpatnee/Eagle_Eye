<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVSS extends Model
{
    use HasFactory;
    protected $table = 'cvss_table';
    public $timestamps = false;
    protected $guarded = [];
}
