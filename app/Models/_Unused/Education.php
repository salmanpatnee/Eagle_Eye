<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'expert_education_table';

    protected $guarded = [];

    public $timestamps = false;



    // Define the many-to-many relationship with Expert
    public function experts()
    {
        return $this->belongsToMany(Expert::class, 'education_expert');
    }
}
