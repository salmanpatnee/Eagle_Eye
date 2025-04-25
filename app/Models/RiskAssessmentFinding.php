<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskAssessmentFinding extends Model
{
    use HasFactory;

    protected $table = 'risk_assessment_details_table';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'risk_assessment_id';
    public $incrementing = false;

    protected $with = ['risk'];

    public function getRouteKeyName()
    {
        return $this->primaryKey; 
    }

    public function risk(){
        return $this->belongsTo(Risk::class, 'risk_id', 'risk_id')
            ->select(['risk_id', 'risk_name']);
    }

    public function treatment(){
        return $this->belongsTo(RiskTreatment::class, 'risk_treatment_id', 'risk_treatment_id')
            ->select(['risk_treatment_id', 'risk_treatment_name']);
    }

    public function controlAssessment() {
        return $this->belongsTo(controlAssessment::class, 'control_assessment_id', 'control_assessment_id');
    }
}
