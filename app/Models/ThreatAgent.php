<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreatAgent extends Model
{
    use HasFactory;

    protected $table = 'threat_agent_table';
    protected $guarded = [];
    public $timestamps = false;

    public function type(){
        return $this->belongsTo(ThreatAgentType::class, 'threat_agent_type_id', 'threat_agent_type_id');
    }

    public function subType(){
        return $this->belongsTo(ThreatAgentSubType::class, 'threat_agent_sub_type_id', 'threat_agent_sub_type_id');
    }

    public function rating(){
        return $this->belongsTo(ThreatAgentRating::class, 'threat_agent_rating_id', 'threat_agent_rating_id');
    }

    public function vectors(){
        return $this->belongsToMany(ThreatAgentVector::class, 'threat_agent_vector_table_vs_threat_agent_table', 'threat_id', 'threat_vector_id', 'threat_agent_id', 'threat_agent_vector_id');
    }
}
