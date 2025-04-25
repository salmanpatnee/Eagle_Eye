<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    use HasFactory;

    protected $table = 'third_party_table';
    protected $guarded = [];
    public $timestamps = false;

    public function experties()
    {
        return $this->belongsToMany(
            TPTExpert::class,
            'tpt_expert_table_vs_third_party_table',
            'tpt_id',
            'tpt_experties_id',
            'tpt_id',
            'tpt_experties_id'
        );
    }
}
