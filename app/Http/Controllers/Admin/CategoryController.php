<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    public $cate;
    public function __construct(Category $category){
        // $this->middleware(['auth','verified']);
         $this->middleware(['auth','verified']);
        $this->cate = $category;
    }
    public function index(){
      
      
            $data = Category::orderBy('id','desc')->paginate(5);
            return view('admin.loadView.categories.maincategory',compact('data'));
       
      
    }
    public function create($id=''){    
        
        $htmlOption = Category::checkPartentId($id);         
        return view('admin.loadView.categories.createcategory', compact('htmlOption'));
    }

    public function store(Request $request){
        
       Category::create([
            'nameCategory' => $request->name,
            'partent_Id' => $request->partent_Id,
            'slug' => Str::slug($request->name,'-'),
        ]);
         return redirect()->route('admin.category.create');
    }
    public function edit($id){
        $value = Category::find($id);
        // $htmlOption = $this->checkPartentId($value->partent_Id);
        $htmlOption = Category::checkPartentId($value->partent_Id);
        return view('admin.loadView.categories.editCategory',compact('value','htmlOption'));
    }
    public function delete($id){
        Category::find($id)->delete();
        return redirect()->route('admin.category.show');
    }

}
