<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPICategories extends Model
{
    use HasFactory;

    protected $table = 'kpi_categories';
    protected $guarded = [];
    public $timestamps = false;

    public function standards()
    {
        return $this->hasMany(KPIStandards::class, 'kpi_id', 'id');
    }
}
