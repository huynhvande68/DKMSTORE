<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Province extends Model
{
    
    protected $table = 'province';
    
    protected $guarded = [];

    public function province_to_district()
    {
        return $this->hasMany('App\Models\Admin\District','province_id','id');
    }
}
