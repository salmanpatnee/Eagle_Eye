<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingSection extends Model
{
    protected $table = 'landing_sections';

    protected $guarded = [];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'meta' => 'array',
        ];
    }
}
