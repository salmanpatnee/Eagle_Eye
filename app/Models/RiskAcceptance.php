<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskAcceptance extends Model
{
    use HasFactory;

    protected $table = 'risk_acceptance_table';
    protected $guarded = [];
    public $timestamps = false;

    public function control(){
        return $this->belongsTo(ControlMaster::class , 'control_id', 'control_id');
    }

    
}
