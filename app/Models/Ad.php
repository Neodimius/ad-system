<?php

namespace App\Models;

use Database\Factories\AdFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    /** @use HasFactory<AdFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'published_at',
    ];
}
