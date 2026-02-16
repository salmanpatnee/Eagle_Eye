<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_categories';
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'article_list',
    ];

    public function processes()
    {
        return $this->belongsToMany(Process::class, 'article_category_process', 'article_category_id', 'process_id');
    }

    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }
}