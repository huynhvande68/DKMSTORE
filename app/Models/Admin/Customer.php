<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    
    protected $table = 'customers';
    
    protected $guarded = [];

    public function order_customer()
    {
        return $this->belongsToMany('App\Models\Admin\Order', 'transactions','customer_id', 'orders_id')->withTimestamps();
    }
}
