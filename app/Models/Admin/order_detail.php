<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $guarded = [];


    public function order_coupon()
    {
        return $this->belongsTo('App\Models\Admin\Coupon', 'qr_code_id','id');
    }

    public function product_relation()
    {
        return $this->belongsTo('App\Models\Admin\Products', 'order_product_id','id');
    }
}
