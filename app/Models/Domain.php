<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domain_table';
    protected $guarded = [];
    public $timestamps = false;

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function subDomains()
    {
        return $this->hasMany(SubDomain::class, 'main_domain_id', 'main_domain_id');
    }


    public function bestPractices()
    {
        return $this->belongsToMany(BestPractice::class, 'best_practice_vs_domain_table', 'main_domain_id', 'best_practices_id', 'main_domain_id', 'best_practices_id');
    }

    public function controls()
    {
        return $this->belongsToMany(
            ControlMaster::class,
            'control_master_table_vs_domain_table',  
            'main_domain_id',                                  
            'control_id',                
            'main_domain_id',
            'control_id',                           
        );                                   
    }
}
