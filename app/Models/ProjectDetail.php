<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;


    protected $fillable = [

        'project_id',
        'item_delivered',
        'created_at',
        'updated_at'
    ];
}
