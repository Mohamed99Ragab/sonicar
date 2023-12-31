<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'price',
        'service',
        'message',
        'created_at',
        'updated_at'
    ];
}
