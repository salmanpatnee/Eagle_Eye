<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HRCertification extends Model
{
    use HasFactory;

    protected $table = 'hr_certification_table';

    protected $guarded = [];

    public $timestamps = false;
}
