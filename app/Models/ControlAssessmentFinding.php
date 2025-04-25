<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlAssessmentFinding extends Model
{
    use HasFactory;

    protected $table = 'control_assessment_details_table';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'control_finding_id';
    public $incrementing = false;

    protected $with = ['control'];

    public function getRouteKeyName()
    {
        return $this->primaryKey; 
    }


    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'control_assessment_detail_vs_category_table',  // Pivot table name
            'control_assessment_finding_id',                // Foreign key on the pivot table (related to this model)
            'category_id',                                  // Foreign key on the pivot table (related to the other model)
            'control_finding_id',                           // Local key on this model (ControlAssessmentDetails)
            'category_id'                                   // Local key on the Category model
        );
    }

    public function control(){
        return $this->belongsTo(ControlMaster::class, 'control_id', 'control_id')
            ->select(['control_id', 'control_name']);
    }

    public function controlAssessment() {
        return $this->belongsTo(controlAssessment::class, 'control_assessment_id', 'control_assessment_id');
    }
}
