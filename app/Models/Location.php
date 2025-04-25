<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location_table';
    protected $guarded = [];
    public $timestamps = false;

    public function departments()
    {
        return $this->hasMany(Department::class, 'location_id', 'location_id');
    }
}
