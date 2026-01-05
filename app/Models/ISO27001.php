<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISO27001 extends Model
{
    use HasFactory;

    protected $table = 'cms_iso27001';
    protected $guarded = [];
    public $timestamps = false;

    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }
}
