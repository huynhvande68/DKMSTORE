<?php

namespace App;

use App\Models\Admin\Products;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','name_avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function hasPermisson($route)
    {
       $routes = $this->routes();      
      
    //    if(in_array(['admin.product.create'],$routes) && !in_array('admin',$this->roles))
    //    {
    //         return 1 === count(Products::where('user_id',Auth::id())) ? true : false ;
    //    }
       return in_array($route,$routes) ? true : false;
    }

    public function routes()
    {
        $arr = [];
        foreach($this->roles as $item)
        {
            foreach($item->roles_permission as $permision)
            {
                array_push($arr,$permision->name);
            }
        }     
        return $arr;
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role', 'role_users', 'user_id' ,'role_id')->withTimestamps();
    }
}
