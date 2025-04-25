<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HROrganization extends Model
{
    use HasFactory;

    protected $table = 'hr_organization_table';

    protected $guarded = [];

    public $timestamps = false;
}
