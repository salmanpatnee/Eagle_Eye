<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custodian extends Model
{
    use HasFactory;

    protected $table = 'custodian_table';
    protected $guarded = [];
    public $timestamps = false;

    public function custodians(){
        return $this->hasMany(CustodianName::class, 'custodian_role_id', 'custodian_role_id');
    }

}
