<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $table = 'cms_process';
    protected $guarded = [];
    public $timestamps = false;

    public function articleCategories()
    {
        return $this->belongsToMany(ArticleCategory::class, 'article_category_process', 'process_id', 'article_category_id');
    }
}