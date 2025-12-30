<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category_table';
    protected $primaryKey = 'category_id';
    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'sub_category_id', 'sub_category_id');
    }

    public function standards()
    {
        return $this->hasMany(KPIStandards::class, 'category_id', 'category_id');
    }

    public function recommededPriorites()
    {
        return $this->hasMany(KPIStandards::class, 'category_id', 'category_id')->where('priority', 1);
    }

    public function standardPriorities()
    {
        return $this->hasMany(KPIStandards::class, 'category_id', 'category_id')->where('priority', '!=', 1)->orWhereNull('priority');
    }

    public function audits()
    {
        return $this->belongsToMany(AuditFinding::class, 'audit_findings_category', 'category_id', 'audit_finding_id');
    }

    public function subDomains()
    {
        return $this->belongsToMany(SubDomain::class, 'category_table_vs_sub_domain_table', 'category_id', 'sub_domain_id');
    }
}
