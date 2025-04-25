<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VectorAgent extends Model
{
    use HasFactory;

    protected $table = 'threat_agent_vector_table';
    protected $guarded = [];
    public $timestamps = false;


}
