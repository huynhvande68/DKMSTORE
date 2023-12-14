<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];


    public function cus()
    {
        return $this->belongsTo('App\Models\Admin\Customer', 'customer_id','id');
    }

    public function tranor()
    {
        return $this->belongsTo('App\Models\Admin\Order', 'orders_id','id');
    }
}
