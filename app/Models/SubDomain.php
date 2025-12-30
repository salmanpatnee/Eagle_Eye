<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDomain extends Model
{
    use HasFactory;

    protected $table = 'sub_domain_table';
    protected $guarded = [];
    public $timestamps = false;

    public function domain() {
        return $this->belongsTo(Domain::class, 'main_domain_id', 'main_domain_id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function bestPractices()
    {
        return $this->belongsToMany(BestPractice::class, 'best_practice_table_vs_sub_domain_table', 'sub_domain_id', 'best_practices_id', 'sub_domain_id', 'best_practices_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_table_vs_sub_domain_table', 'sub_domain_id', 'category_id', 'sub_domain_id', 'category_id');
    }

    public function controls()
{
    return $this->belongsToMany(
        ControlMaster::class,
        'control_master_table_vs_sub_domain_table',  
        'sub_domain_id',             // Foreign key on pivot table related to SubDomain model
        'control_id',                // Foreign key on pivot table related to Control model
        'sub_domain_id',             // Local key on SubDomain model
        'control_id'                 // Local key on Control model
    );
}
}
