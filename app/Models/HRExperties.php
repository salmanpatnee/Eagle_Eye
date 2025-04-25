<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HrExperties extends Model
{
    use HasFactory;

    protected $table = 'hr_expertise_table';

    protected $guarded = [];

    public $timestamps = false;

}
