<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded= [];

    public function blogs()
    {
        return $this->belongsToMany('App\Models\Admin\Tags', 'blog_tags', 'blog_id', 'tag_id')->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id','id');
    }
}
