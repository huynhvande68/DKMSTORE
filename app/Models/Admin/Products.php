<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function img()
    {
        return $this->hasMany('App\Models\Admin\ProductImages','product_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Admin\Tags', 'tag_products', 'product_id', 'tag_id')->withTimestamps();
    }
    public function product_corresponding()
    {
        return $this->belongsTo('App\Models\Admin\Category', 'category_id','id');
    }
}
