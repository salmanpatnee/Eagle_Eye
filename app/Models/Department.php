<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department_table';
    public $timestamps = false;
    protected $guarded = [];

    public function location()
    {
        // Inverse of // 1 to many
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    public function subDepartments()
    {
        // 1 to many
        return $this->hasMany(SubDepartment::class, null, 'department_id');
    }
}
