<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreatAgentRating extends Model
{
    use HasFactory;

    protected $table = 'threat_agent_rating_table';
    protected $guarded = [];
    public $timestamps = false;
}
