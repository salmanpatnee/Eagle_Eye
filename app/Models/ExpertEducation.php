<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertIndustry extends Model
{
    use HasFactory;

    protected $table = 'expert_education';

    public function education()
    {
        return $this->belongsToMany(Education::class, 'expert_education', 'expert_id', 'education_id');
    }
}
