<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_slug',
        'seo_title',
        'seo_meta_description',
        'category_image'
    ];

    public function rBlog() {
        return $this->hasMany( Blog::class, 'category_id', 'id' );
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
