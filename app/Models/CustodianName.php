<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustodianName extends Model
{
    use HasFactory;

    protected $table = 'custodian_name_table';
    protected $guarded = [];
    public $timestamps = false;

    public function role() {
        return $this->belongsTo(Custodian::class, 'custodian_role_id', 'custodian_role_id');
    }
}
