<?php

namespace App\Http\Controllers\User_m;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slide;
use App\Models\Admin\Category;
use App\Models\Admin\Products;
use Illuminate\Support\Str;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\SearchbarRequest;
use App\Models\Admin\Blog;
use DB;
class UserController extends Controller
{


      public function __construct(){
      }
      public function index()
      {
          $view_slide = Slide::pluck('path');
          $slidebar   = Category::where('partent_Id',0)->take(2)->get();
          $next_blog = Blog::take(2)->get();
          foreach($slidebar as $item)
          {
            if($item->category_rev->count()){
              foreach($item->category_rev as $itemc){
                $conn[] = $itemc;
              }
            }
          }
              $collection = collect($conn);
              $con = $collection->chunk(4);
              
            return view('user_m.loadView.view_main.index',compact('view_slide','con','next_blog'));
      }

      public function product_singer($id)
      {
        $product = Products::where('id',$id)->first();       
        if($product == null){
          return redirect()->back();
        }
        else
        {
          $converted = Str::substr($product->name, 0, 2);
          $product_similler = Products::whereNotIn('id', [$product->id])
          ->where('name', 'like', $converted. '%' )
          ->get();
          return view('user_m.loadView.view_main.singer_product',compact('product','product_similler'));
        }
        
        
      }
      public function show_param(Request $request)
      {  
        //select null  
        $check = true;
        if($request->param  == null)
        {
          $product  = Products::paginate(6);
          $htmlOption = view('user_m.loadView.view_main.recusive_index2',compact('product','check'))->render();
          return response()->json([
            'code' => 200,
            'table_data' => $htmlOption,
            'message' => 'Đã thêm vào giỏ hàng'

        ],200);
        }
        if($request->param == 'high')
        {
          // select equal high
          $htmlOption = $this->check($request->param,'high','price','DESC');
        }
        if($request->param == 'low')
        {
           // select equal low
        $htmlOption = $this->check($request->param,'low','price','ASC');
        }
    
          // select equal popularity
        // select equal newness
        return response()->json([
          'code' => 200,
          'table_data' => $htmlOption,
          'message' => 'success'

      ],200);
             
       
    
       
      }

      
      public function index2()
      {
       
        $product  = Products::paginate(6);
        $check = true;
       return view('user_m.loadView.view_main.index2',compact('product','check'));
      }

      public function check($request,$pr , $colum , $v_colum)
      {     $check = true;
          if($request == $pr)
          {
            $product = Products::orderBy($colum,$v_colum)->paginate(6);    
            $htmlOption = view('user_m.loadView.view_main.recusive_index2',compact('product','check'))->render();            
             return $htmlOption;
          }
      
    
      }

      public function search_leftbar(SearchRequest $request)
      {      
            $check = true;             
            $product =  Products::where('category_id', $request->radio)
            ->where('price','<=',$request->price )->paginate(6);
          if($product->count() >0){

            return view('user_m.loadView.view_main.index2',compact('product','check'));
          }
          else{
            $check = false;
            return view('user_m.loadView.view_main.index2',compact('check'));
          }
       
      
      }
      public function search_sidebar(SearchbarRequest $request)
      {      
            $check = true;             
            $product = Products::where('name', 'like', '%' .$request->search. '%')->paginate(6);
          if($product->count() >0){

            return view('user_m.loadView.view_main.index2',compact('product','check'));
          }
          else{
            $check = false;
            return view('user_m.loadView.view_main.index2',compact('check'));
          }
       
      
      }

      public function part_sidebar($param)
      {
            $check = true;             
            $product =  Products::where('category_id', $param)->paginate(6);
            if($product->count() >0){
              return view('user_m.loadView.view_main.index2',compact('product','check'));
            }
            else{
              $check = false;
              return view('user_m.loadView.view_main.index2',compact('check'));
            } 

      }

      public function search_ajax(Request $request)
      {    
           $check = true;
          $product = Products::where('name', 'like', '%' .$request->param. '%')->paginate(6);
          $htmlOption = view('user_m.loadView.view_main.recusive_index2',compact('product','check'))->render();
          return response()->json([
            'code' => 200,
            'table_data' => $htmlOption,
            'message' => 'Đã thêm vào giỏ hàng'

        ],200);
        
      }
}
