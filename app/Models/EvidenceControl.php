<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvidenceControl extends Model
{
    use HasFactory;
    
    protected $table = 'evidence_vs_control_table';

    public $timestamps = false;

    protected $guarded = [];

}
