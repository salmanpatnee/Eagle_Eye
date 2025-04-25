<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HumanResource extends Model
{
    use HasFactory;

    protected $table = 'hr_expert_master_table';
    protected $guarded = [];
    public $timestamps = false;

    public function industry() {
        return $this->belongsTo(Industry::class, 'industry_id', 'industry_id');
    }

    public function organization() {
        return $this->belongsTo(HROrganization::class, 'organization_id', 'organization_id');
    }

    public function certifications()
    {
        return $this->belongsToMany(
            HRCertification::class,
            'hr_expert_master_vs_certification_table',  
            'expert_id',                
            'certification_id',                                  
            'expert_id',                           
            'certification_id'  
        );                                 
    }

    public function experties()
    {
        return $this->belongsToMany(
            Experties::class,
            'hr_expert_master_vs_expertise_table',  
            'expert_id',                
            'expertise_id',                                  
            'expert_id',                           
            'expertise_id'  
        );                                 
    }

    public function roles()
    {
        return $this->belongsToMany(
            HRRole::class,
            'hr_expert_master_vs_roles_table',  
            'expert_id',                
            'role_id',                                  
            'expert_id',                           
            'role_id'  
        );                                 
    }

    
}
