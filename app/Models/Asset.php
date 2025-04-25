<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'asset_register_table';
    protected $guarded = [];
    public $timestamps = false;


    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_table_vs_asset_table',
            'asset_id',                
            'category_id',             
            'asset_id',                
            'category_id'              
        );
    }

    public function custodians()
    {
        return $this->belongsToMany(
            CustodianName::class,
            'custodian_name_table_vs_asset_register_table',
            'asset_id',                
            'custodian_name_id',             
            'asset_id',                
            'custodian_name_id'              
        );
    }

    public function assetGroup() {
        return $this->belongsTo(AssetGroup::class, 'asset_group_id', 'asset_group_id');
    }

    public function assetType() {
        return $this->belongsTo(AssetType::class, 'asset_type_id', 'asset_type_id');
    }

    public function assetSubType() {
        return $this->belongsTo(AssetSubType::class, 'asset_sub_type_id', 'asset_sub_type_id');
    }

    public function owner() {
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function assetStatus() {
        return $this->belongsTo(AssetStatus::class, 'asset_status_id', 'asset_status_id');
    }

    public function location() {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    public function classification() {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function findings()
    {
        return $this->belongsToMany(
            PenTestFinding::class,
            'va_pt_test_table_vs_asset_table',
            'asset_id',
            'va_pt_finding_id',
            'asset_id',
            'va_pt_finding_id'
        );
    }

}
