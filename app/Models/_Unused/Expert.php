<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $table = 'expert_experties_table';

    protected $guarded = [];

    public $timestamps = false;

    public function scopeFilter($query, array $filters)
    {


        if ($filters['organization'] ?? false) {
            $organization = $filters['organization'];
            $query->whereHas('organization', function ($query) use ($organization) {
                $query->where('expert_organization_id', $organization);
            });
        }

        if ($filters['industry'] ?? false) {
            $industry = $filters['industry'];
            $query->whereHas('industry', function ($query) use ($industry) {
                $query->where('industry_id', $industry);
            });
        }

        if ($filters['certification'] ?? false) {
            $certification = $filters['certification'];
            $query->whereHas('certifications', function ($query) use ($certification) {
                $query->where('expert_id', $certification);
            });
        }

        if ($filters['education'] ?? false) {
            $education = $filters['education'];
            $query->whereHas('educations', function ($query) use ($education) {
                $query->where('education_id', $education);
            });
        }


        // if ($filters['domain'] ?? false) {
        //     $domain = $filters['domain'];

        //     $query->whereHas('domain', function ($query) use ($domain) {
        //         $query->where('main_domain_id', $domain);
        //     });
        // }

        // if ($filters['subdomain'] ?? false) {
        //     $subDomain = $filters['subdomain'];

        //     $query->whereHas('subDomain', function ($query) use ($subDomain) {
        //         $query->where('sub_domain_id', $subDomain);
        //     });
        // }

        // if ($filters['relation'] ?? false) {
        //     $relation = $filters['relation'];
        //     $query->where($relation, 'Yes');
        // }
    }


    public function organization()
    {
        return $this->belongsTo(Organization::class, 'expert_organization_id', 'expert_organization_id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id', 'industry_id');
    }

    public function educations()
    {
        return $this->belongsToMany(Education::class, 'education_expert');
    }

    public function certifications()
    {
        return $this->belongsToMany(Certification::class, 'certification_expert');
    }

    public function experties()
    {
        return $this->belongsToMany(Experties::class, 'expert_experties');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'expert_role');
    }
}
