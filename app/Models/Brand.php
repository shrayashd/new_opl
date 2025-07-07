<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'description',
        'short_description',
        'parent_id',
        'category_id',

        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_brands', 'brand_id', 'product_id');
    }

    public function parent()
    {
        return $this->belongsTo(Brand::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Brand::class, 'parent_id');
    }
}
