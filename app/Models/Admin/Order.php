<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

   public function order_order_detail()
   {
    return $this->hasMany('App\Models\Admin\order_detail', 'order_id', 'id');
   } 
   public function order_transaction()
    {
        return $this->belongsToMany('App\Models\Admin\Customer', 'transactions', 'orders_id', 'customer_id')->withTimestamps();
    }
    public function ward()
    {
        return $this->belongsTo('App\Models\Admin\Wards', 'wards_id','id');
    }
}
