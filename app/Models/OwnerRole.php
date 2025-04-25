<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerRole extends Model
{
    use HasFactory;

    protected $table = 'owner_role_table';
    protected $guarded = [];
    public $timestamps = false;

    public function owners(){
        return $this->hasMany(Owner::class, 'owner_role_id', 'owner_role_id');
    }

    public function assetGroups(){
        return $this->hasMany(AssetGroup::class, 'owner_id', 'owner_role_id');
    }
}
