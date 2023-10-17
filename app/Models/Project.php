<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'url',
        'is_featured',
        'home_img',
        'created_at',
        'updated_at'
    ];



    public function projectDetails(){

        return $this->hasMany(ProjectDetail::class,'project_id');
    }

    public function attachments(){

        return $this->hasMany(ProjectAttachment::class,'project_id');
    }
}
