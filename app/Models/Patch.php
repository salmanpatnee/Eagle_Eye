<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patch extends Model
{
    use HasFactory;

    protected $table = 'patch_table';
    protected $guarded = [];
    public $timestamps = false;

    public function thirdParty() {
        return $this->belongsTo(ThirdParty::class, 'tpt_id', 'tpt_id');
    }
}
