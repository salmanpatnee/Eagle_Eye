<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CisoEssentialFramework extends Model
{
    use HasFactory;

    protected $table = 'ciso_essential_frameworks';

    protected $fillable = ['title', 'description', 'image'];

    public $timestamps = false;

    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }
}
