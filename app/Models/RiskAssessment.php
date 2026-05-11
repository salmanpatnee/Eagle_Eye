<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RiskAssessment extends Model
{
    use HasFactory;

    protected $table = 'risk_assessment_master_table';

    protected $guarded = [];

    public $timestamps = false;

    public function findings()
    {
        return $this->hasMany(RiskAssessmentDetail::class, 'risk_assessment_id', 'risk_assessment_id');
    }

    public function controlAssessments(): BelongsToMany
    {
        return $this->belongsToMany(
            ControlAssessment::class,
            'risk_assessment_vs_control_assessment_table',
            'risk_assessment_id',
            'control_assessment_id',
            'risk_assessment_id',
            'control_assessment_id'
        );
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id')->select('location_id', 'location_name');
    }

    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'auditor_id')->select('auditor_id', 'auditor_first_name', 'auditor_last_name');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id')->select('classification_id', 'classification_name');
    }
}
