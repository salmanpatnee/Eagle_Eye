<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetSubType extends Model
{
    use HasFactory;

    protected $table = 'asset_sub_type_table';
    protected $guarded = [];
    public $timestamps = false;

    public function type() {
        return $this->belongsTo(AssetType::class, 'asset_type_id', 'asset_type_id');
    }
}
