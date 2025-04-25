<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlAssessment extends Model
{
    use HasFactory;

    protected $table = 'control_assessment_master_table';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'control_assessment_id';
    public $incrementing = false;

    public function getRouteKeyName()
    {
        return $this->primaryKey; 
    }


    public function findings() {
        return $this->hasMany(ControlAssessmentFinding::class, 'control_assessment_id', 'control_assessment_id');
    }

    public function bestpractice() {
        return $this->belongsTo(BestPractice::class, 'best_practices_id', 'best_practices_id')->select('best_practices_id', 'best_practices_name');
    }

    public function location() {
        return $this->belongsTo(Location::class, 'location_id', 'location_id')->select('location_id', 'location_name');
    }

    public function auditor() {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'auditor_id')->select('auditor_id', 'auditor_first_name', 'auditor_last_name');
    }

    public function classification() {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id')->select('classification_id', 'classification_name');
    }
}
