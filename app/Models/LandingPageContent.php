<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingPageContent extends Model
{
    protected $table = 'landing_page_content';

    protected $fillable = [
        'hero_title',
        'hero_list_items',
        'hero_image_path',
        'features_title',
        'features_list_items',
        'features_image_path',
        'benefits_title',
        'benefits_left_title',
        'benefits_left_items',
        'benefits_right_title',
        'benefits_right_items',
        'stats_title',
        'stats_subtitle',
        'cyber_professionals_title',
        'cyber_professionals_content',
        'cyber_professionals_image_path',
        'cyber_professionals_notice_title',
        'cyber_professionals_notice_content',
    ];
}
