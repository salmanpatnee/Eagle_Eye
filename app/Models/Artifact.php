<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    
    protected $table = 'artifact_table';

    public $timestamps = false;

    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'artifact_id');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'artifact_category_id');
    }
    
    public function evidences()
    {
        return $this->belongsToMany(Evidence::class, 'evidence_vs_artifact_table', 'artifact_id', 'evidence_id');
    }
}
