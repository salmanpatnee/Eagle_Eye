<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetGroup extends Model
{
    use HasFactory;

    protected $table = 'asset_group_table';
    protected $guarded = [];
    public $timestamps = false;

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function classification(){
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function custodians()
    {
        return $this->belongsToMany(
            Custodian::class,
            'custodian_name_table_vs_asset_group_table',  
            'asset_group_id',                
            'custodian_id',                                  
            'asset_group_id',                           
            'custodian_role_id'
        );                                   
    }

    public function risks()
    {
        return $this->belongsToMany(
            Risk::class,
            'risk_vs_asset_group_table',
            'asset_group_id',
            'risk_id',
            'asset_group_id',
            'risk_id'
        );
    }
}
