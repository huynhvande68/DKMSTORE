<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded= [];

    public function roles_permission()
    {
        return $this->belongsToMany('App\Models\Admin\Permission', 'role_permissions', 'role_id' ,'permission_id')->withTimestamps();
    }
}
