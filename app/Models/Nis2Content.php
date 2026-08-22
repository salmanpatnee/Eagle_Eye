<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Nis2Content extends Model
{
    use HasFactory;

    protected $table = 'nis2_contents';

    protected $fillable = ['title', 'description', 'sort_order', 'image'];

    public $timestamps = false;

    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }
}
