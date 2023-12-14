<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Wards extends Model
{
    
    protected $table = 'wards';
    
    protected $guarded = [];

    public function belongDistrict()
    {
        return $this->belongsTo('App\Models\Admin\District', 'district_id','id');
    }
}
