<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\components\Recusive;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nameCategory', 'partent_Id', 'slug',
    ];

    public static function checkPartentId($id){
        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->RecusiveCategory($id);
        return $htmlOption;
    }
    public function category_rev(){
      return   $this->hasMany('App\Models\Admin\Category', 'partent_Id', 'id');
    }
    public function product_rev(){
       return  $this->hasMany('App\Models\Admin\Products', 'category_id', 'id');
    }
    
}
