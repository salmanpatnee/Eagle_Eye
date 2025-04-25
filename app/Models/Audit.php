<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    protected $table = 'audit_master_table';
    protected $guarded = [];
    public $timestamps = false;

    public function location() {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    public function auditor() {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'auditor_id');
    }

    public function classification() {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function bestPractice() {
        return $this->belongsTo(BestPractice::class, 'best_practice', 'best_practices_id');
    }

    public function findings() {
        return $this->hasMany(AuditFinding::class, 'audit_id', 'audit_id');
    }
}
