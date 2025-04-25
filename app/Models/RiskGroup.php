<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskGroup extends Model
{
    use HasFactory;

    protected $table = 'risk_group_table';
    protected $guarded = [];
    public $timestamps = false;

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    
}
