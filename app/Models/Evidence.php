<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;
    
    protected $table = 'evidence_table';

    protected $guarded = [];
    
    public $timestamps = false;
    
    public function classification(){
        return $this->belongsTo(Classification::class, 'classification_id', 'classification_id');
    }

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_role_id');
    }

    public function controls()
    {
        return $this->belongsToMany(ControlMaster::class, 'evidence_vs_control_table', 'evidence_id', 'control_id', 'evidence_id', 'control_id')
        ->withPivot('evidence_id', 'control_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'evidence_vs_category_table', 'evidence_id', 'category_id', 'evidence_id', 'category_id')
        ->withPivot('evidence_id', 'evidence_id');
    }

    public function artifacts()
    {
        return $this->belongsToMany(Artifact::class, 'evidence_vs_artifact_table', 'evidence_id', 'artifact_id', 'evidence_id', 'artifact_id')
            ->select('artifact_table.id', 'artifact_table.artifact_id', 'artifact_table.artifact_name');
    }
    
}
