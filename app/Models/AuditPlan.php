<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditPlan extends Model
{
    use HasFactory;

    protected $table = 'audit_plan_table';
    protected $guarded = [];
    public $timestamps = false;

    public function auditee()
    {
        return $this->belongsTo(Auditee::class, 'auditee_id', 'auditee_id');
    }

    public function auditor()
    {
        return $this->belongsTo(Auditor::class, 'auditor_id', 'auditor_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }
}
