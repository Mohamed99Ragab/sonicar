<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'status',
        'category_id',
        'created_at',
        'updated_at',
        'file'
    ];


    public function category(){

        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }


//    mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
