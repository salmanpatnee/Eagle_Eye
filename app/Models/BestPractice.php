<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestPractice extends Model
{
    use HasFactory;

    protected $table = 'best_practice_table';
    protected $primaryKey = 'best_practices_id';
    protected $keyType = 'string';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    public function controls()
    {
        return $this->belongsToMany(
            ControlMaster::class,
            'control_master_table_vs_best_practice_table',  // Pivot table name
            'best_practice_id',                // Foreign key on the pivot table (related to this model)
            'control_id',                                  // Foreign key on the pivot table (related to the other model)
            'best_practices_id',                           // Local key on this model (ControlAssessmentDetails)
            'control_id'                                   // Local key on the Category model
        )->select('control_master_table.control_id', 'control_master_table.control_name', 'owner_id');
    }

    public function domains()
    {
        return $this->belongsToMany(Domain::class, 'best_practice_vs_domain_table', 'best_practices_id', 'main_domain_id', 'best_practices_id', 'main_domain_id');
    }

    public function subDomains()
    {
        return $this->belongsToMany(SubDomain::class, 'best_practice_table_vs_sub_domain_table', 'best_practices_id', 'sub_domain_id', 'best_practices_id', 'sub_domain_id');
    }

    public function standards()
    {
        return $this->hasMany(KPIStandards::class, 'best_practice_id', 'best_practices_id');
    }
}
