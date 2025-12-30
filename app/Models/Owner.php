<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owner_table';
    protected $guarded = [];
    public $timestamps = false;

    public function risks()
    {
        return $this->hasMany(Risk::class, 'owner_id', 'owner_role_id');
    }


    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function role(){
        return $this->belongsTo(OwnerRole::class, 'owner_role_id', 'owner_role_id');
    }
}
