<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditee extends Model
{
    use HasFactory;

    protected $table = 'auditee_table';
    protected $guarded = [];
    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Department::class, 'auditee_department', 'department_id');
    }
}
