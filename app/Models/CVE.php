<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CVE extends Model
{
    use HasFactory;
    protected $table = 'cve_table';
    public $timestamps = false;
    protected $guarded = [];
}
