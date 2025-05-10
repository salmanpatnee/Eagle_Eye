<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ControlMaster extends Model
{
    use HasFactory;

    protected $table = 'control_master_table';
    protected $guarded = [];
    public $timestamps = false;

    public function scopeFilter($query, array $filters)
    {

        if ($filters['control_name'] ?? false) {
            $query->where('control_name', $filters['control_name']);
        }

        if ($filters['classification'] ?? false) {
            $classification = $filters['classification'];
            $query->whereHas('classification', function ($query) use ($classification) {
                $query->where('classification_id', $classification);
            });
        }

        if ($filters['category'] ?? false) {
            $category = $filters['category'];
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('category_id', $category);
            });
        }

        if ($filters['type'] ?? false) {
            $type = $filters['type'];
            $query->whereHas('type', function ($query) use ($type) {
                $query->where('control_type_id', $type);
            });
        }

        if ($filters['practice'] ?? false) {
            $practice = $filters['practice'];
            $query->whereHas('bestPractice', function ($query) use ($practice) {
                $query->where('best_practices_id', $practice);
            });
        }

        if ($filters['domain'] ?? false) {
            $domain = $filters['domain'];

            $query->whereHas('domain', function ($query) use ($domain) {
                $query->where('main_domain_id', $domain);
            });
        }

        if ($filters['subdomain'] ?? false) {
            $subDomain = $filters['subdomain'];

            $query->whereHas('subDomain', function ($query) use ($subDomain) {
                $query->where('sub_domain_id', $subDomain);
            });
        }

        if ($filters['relation'] ?? false) {
            $relation = $filters['relation'];
            $query->where($relation, 'Yes');
        }
    }

    public function scopeOrderControls($query, $tablePrefix = 'control_master_table') {
        $query->orderBy('b.sort_order')
        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(control_master_table.control_id, '-', 1) AS UNSIGNED)"))
        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_master_table.control_id, '-', 3), '-', -1) AS UNSIGNED)"))
        ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_master_table.control_id, '-', 4), '-', -1) AS UNSIGNED), 0)"))
        ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_master_table.control_id, '-', 5), '-', -1) AS UNSIGNED), 0)"))
        ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(control_master_table.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)"));
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function type()
    {
        return $this->belongsTo(ControlType::class, 'control_type_id', 'control_type_id');
    }

    public function bestPractice()
    {
        return $this->belongsTo(BestPractice::class, 'best_practices_id', 'best_practices_id');
    }

    public function bestPractices()
    {
        return $this->belongsToMany(
            BestPractice::class,
            'control_master_table_vs_best_practice_table',  
            'control_id',                
            'best_practice_id',                                  
            'control_id',                           
            'best_practices_id'  
        );                                 
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'control_master_table_vs_category_table',  
            'control_id',                
            'category_id',                                  
            'control_id',                           
            'category_id'  
        );                                 
    }

    public function custodians()
    {
        return $this->belongsToMany(
            Custodian::class,
            'control_master_table_vs_custodian_role_table',  
            'control_id',                
            'custodian_id',                                  
            'control_id',                           
            'custodian_role_id'
        );                                   
    }

    public function domains()
    {
        return $this->belongsToMany(
            Domain::class,
            'control_master_table_vs_domain_table',  
            'control_id',                
            'main_domain_id',                                  
            'control_id',                           
            'main_domain_id'
        );                                   
    }

    public function subDomains()
    {
        return $this->belongsToMany(
            SubDomain::class,
            'control_master_table_vs_sub_domain_table',  
            'control_id',                
            'sub_domain_id',                                  
            'control_id',                           
            'sub_domain_id'
        );                                   
    }

    public function risks()
    {
        return $this->belongsToMany(
            Risk::class,
            'risk_vs_control_table',  
            'control_id',                
            'risk_id',                                  
            'control_id',                           
            'risk_id'
        );                                   
    }


    public function domain()
    {
        return $this->belongsTo(Domain::class, 'main_domain_id', 'main_domain_id');
    }

    public function subDomain()
    {
        return $this->belongsTo(SubDomain::class, 'sub_domain_id', 'sub_domain_id');
    }

    public function findings(){
        return $this->belongsToMany(AuditFinding::class, 'audit_finding_vs_control_table', 'control_id', 'audit_finding_id', 'control_id', 'audit_finding_id');
    }

    public function children()
    {
        return $this->hasMany(ControlMaster::class, 'control_parent', 'control_id');
    }

    public function parent()
    {
        return $this->belongsTo(ControlMaster::class, 'control_parent', 'control_id');
    }
}
