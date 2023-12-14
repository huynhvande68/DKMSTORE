<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{

    protected $fillable = ['name'];

    
    public function tags_product()
    {
        return $this->belongsToMany('App\Models\Admin\Products', 'tag_products', 'tag_id','product_id')->withTimestamps();
    }

    public function tags_blog()
    {
        return $this->belongsToMany('App\Models\Admin\Blog', 'blog_tags', 'tag_id','blog_id')->withTimestamps();
    }
}
