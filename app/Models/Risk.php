<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;

    protected $table = 'risk_master_table';
    protected $guarded = [];
    public $timestamps = false;

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function group()
    {
        return $this->belongsTo(RiskGroup::class, 'risk_group_id', 'risk_group_id');
    }

    public function type()
    {
        return $this->belongsTo(RiskType::class, 'risk_type_id', 'risk_type_id');
    }

    public function subType()
    {
        return $this->belongsTo(RiskSubType::class, 'risk_sub_type_id', 'risk_sub_type_id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function inherent()
    {
        return $this->belongsTo(RiskInherent::class, 'risk_inherent_id', 'risk_inherent_id');
    }

    public function agents()
    {
        return $this->belongsToMany(
            ThreatAgent::class,
            'risk_master_table_vs_threat_agent_table',
            'risk_id',
            'threat_agent_id',
            'risk_id',
            'threat_agent_id'
        );
    }

    public function vulnerabilities()
    {
        return $this->belongsToMany(
            Vulnerability::class,
            'va_table_vs_risk_master_table',
            'risk_id',
            'va_id',
            'risk_id',
            'va_id'
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'risk_master_table_vs_category_table',
            'risk_id',
            'category_id',
            'risk_id',
            'category_id'
        );
    }

    public function assetGroups()
    {
        return $this->belongsToMany(
            AssetGroup::class,
            'risk_vs_asset_group_table',
            'risk_id',
            'asset_group_id',
            'risk_id',
            'asset_group_id'
        );
    }

    public function kris()
    {
        return $this->belongsToMany(
            KeyRiskIndicator::class,
            'risk_master_table_vs_risk_kri_table',
            'risk_id',
            'risk_kri_id',
            'risk_id',
            'key_risk_indicator_id'
        );
    }

    public function kpis()
    {
        return $this->belongsToMany(
            KeyPerformanceIndicator::class,
            'risk_master_table_vs_risk_kpi_table',
            'risk_id',
            'risk_kpi_id',
            'risk_id',
            'key_performance_indicatory_id'
        );
    }

    public function acceptances()
    {
        return $this->belongsToMany(
            RiskAcceptance::class,
            'risk_master_table_vs_risk_acceptance_table',
            'risk_id',
            'risk_acceptance_id',
            'risk_id',
            'risk_acceptance_id'
        );
    }

    public function departments()
    {
        return $this->belongsToMany(
            Department::class,
            'risk_master_table_vs_department_table',
            'risk_id',
            'department_id',
            'risk_id',
            'department_id'
        );
    }

    public function custodians()
    {
        return $this->belongsToMany(
            Custodian::class,
            'risk_master_table_vs_custodian_role_table',
            'risk_id',
            'custodian_id',
            'risk_id',
            'custodian_role_id'
        );
    }

    public function controls()
    {
        return $this->belongsToMany(
            ControlMaster::class,
            'risk_vs_control_table',  
            'risk_id',                
            'control_id',                                  
            'risk_id',
            'control_id'                           
        );                                   
    }
}
