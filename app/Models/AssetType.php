<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;

    protected $table = 'asset_type_table';
    protected $guarded = [];
    public $timestamps = false;


    public function subTypes() {
        return $this->hasMany(AssetSubType::class, 'asset_type_id', 'asset_type_id');
    }
}
