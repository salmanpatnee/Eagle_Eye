<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $table = 'classification_table';
    protected $guarded = [];
    public $timestamps = false;

    public function domains() {
        return $this->hasMany(Domain::class, 'classification_id', 'classification_id');
    }

    public function subDomains() {
        return $this->hasMany(SubDomain::class, 'classification_id', 'classification_id');
    }
}
