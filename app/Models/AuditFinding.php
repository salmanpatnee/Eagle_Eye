<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditFinding extends Model
{
    use HasFactory;

    protected $table = 'audit_findings_table';
    protected $guarded = [];
    public $timestamps = false;

    const STATUSES = [
        'Open - Not Started',
        'Open - WIP',
        'Closed'
    ];
    
    public function custodians()
    {
        return $this->belongsToMany(Custodian::class, 'audit_findings_vs_custodians', 'audit_finding_id', 'custodian_id', 'audit_finding_id', 'custodian_role_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'audit_findings_category', 'audit_finding_id', 'category_id', 'audit_finding_id', 'category_id');
    }
    
    public function controls(){
        return $this->belongsToMany(ControlMaster::class, 'audit_finding_vs_control_table', 'audit_finding_id', 'control_id', 'audit_finding_id', 'control_id');
    }

    public function audit() {
        return $this->belongsTo(Audit::class, 'audit_id', 'audit_id');
    }
    

    public function domain() {
        return $this->belongsTo(Domain::class, 'domain_id', 'main_domain_id');
    }

    public function assets(){
        return $this->belongsToMany(Asset::class, 'audit_findings_vs_assets_table', 'audit_finding_id', 'asset_id', 'audit_finding_id', 'asset_id');
    }

    public function assetsGroups (){
        return $this->belongsToMany(AssetGroup::class, 'audit_findings_vs_assets_group_table', 'audit_finding_id', 'asset_group_id', 'audit_finding_id', 'asset_group_id');
    }

    public function owner() {
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function auditee() {
        return $this->belongsTo(Auditee::class, 'auditee_id', 'auditee_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
