<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OhmBytes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'image', 'banner', 'description', 'seo_title', 'seo_description',
        'seo_keywords',
        'seo_schema', 'status'
    ];
}
