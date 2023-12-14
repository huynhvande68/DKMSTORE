<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class District extends Model
{
    
    protected $table = 'district';
    
    protected $guarded = [];
    
    public function district_to_wards()
    {
        return $this->hasMany('App\Models\Admin\Wards','district_id','id');
    }
    public function belongProvince()
    {
        return $this->belongsTo('App\Models\Admin\Province', 'province_id','id');
    }
}
