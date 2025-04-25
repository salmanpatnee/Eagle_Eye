<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreatAgentType extends Model
{
    use HasFactory;

    protected $table = 'threat_agent_type_table';
    protected $guarded = [];
    public $timestamps = false;

    public function subTypes(){
        return $this->hasMany(ThreatAgentSubType::class, 'threat_agent_type_id', 'threat_agent_type_id');
    }
}
