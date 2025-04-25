<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPIStandards extends Model
{
    use HasFactory;

    protected $table = 'kpi_standards';
    protected $primaryKey = 'kpi_id';
    protected $keyType = 'string';
    protected $guarded = [];
    public $timestamps = false;

    const FREQUENCY_UNITS = [
        'Periodically',
        'Sec',
        'Min',
        'Hourly',
        'Daily',
        'Weekly',
        'Monthly',
        'Quarterly',
        'Half Yearly',
        'Yearly',
        '2-Year',
        '3-Year',
        '4-Year',
        '5-Year',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function bestPractice()
    {
        return $this->belongsTo(BestPractice::class, 'best_practice_id', 'best_practices_id');
    }
}
