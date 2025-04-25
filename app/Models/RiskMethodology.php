<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskMethodology extends Model
{
    use HasFactory;

    protected $table = 'risk_methodology_table';
    protected $guarded = [];
    public $timestamps = false;

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function appetite(){
        return $this->belongsTo(RiskAppetite::class, 'risk_appetite_determination', 'risk_appetite_id');
    }

    public function acceptance(){
        return $this->belongsTo(RiskAcceptance::class, 'risk_acceptance', 'risk_acceptance_id');
    }

    public function asset() {
        return $this->belongsTo(Asset::class, 'asset_identification', 'asset_id');
    }

    public function threat() {
        return $this->belongsTo(ThreatAgent::class, 'threat_identification', 'threat_agent_id');
    }

    public function vulnerability() {
        return $this->belongsTo(Vulnerability::class, 'vulnerability_identification', 'va_id');
    }

    public function risk() {
        return $this->belongsTo(Risk::class, 'risk_name', 'risk_id');
    }

  

    
}
