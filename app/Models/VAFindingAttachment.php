<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VAFindingAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "va_pt_finding_attachments";
    public $timestamps = false;

}
