<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $table = 'cms_process';
    protected $guarded = [];
    public $timestamps = false;

    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }
}
