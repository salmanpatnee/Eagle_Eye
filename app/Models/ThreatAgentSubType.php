<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreatAgentSubType extends Model
{
    use HasFactory;

    protected $table = 'threat_agent_sub_type_table';
    protected $guarded = [];
    public $timestamps = false;

    public function type(){
        return $this->belongsTo(ThreatAgentType::class, 'threat_agent_type_id', 'threat_agent_type_id');
    }
}
