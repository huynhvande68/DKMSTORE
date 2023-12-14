<?php

namespace App\Http\Controllers\User_m;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Tags;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestSearchBlog;

class BlogController extends Controller
{


    public function index()
    {
        $blog = Blog::paginate(6);       
        return view('user_m.loadView.blog.index_gridblog',compact('blog'));
    }
   
    public function read($id)
    {
        $blog = Blog::find($id);  
        $tag = Tags::get();
        $recentely_blog = Blog::get();
        $next_blog = Blog::latest()->take(2)->get();
        $dem = $blog->care_product;
        $blog->update([
          'care_product' => $dem + 1
        ]);
        return view('user_m.loadView.blog.read_gridblog',compact('blog','recentely_blog','next_blog','tag'));
    }

    public function tag($id)
    {
        $tag = Tags::find($id);       
        $check = true; 
        if($tag->tags_product->count() >0){
            $product = $tag->tags_product()->paginate(6);
            return view('user_m.loadView.view_main.index2',compact('product','check'));
          }
          else{
            $check = false;
            return view('user_m.loadView.view_main.index2',compact('check'));
          }
    }

    public function tagblog($id)
    {
        $tag = Tags::find($id);
        $blog = $tag->tags_blog()->paginate(6);
        return view('user_m.loadView.blog.index_gridblog',compact('blog'));

    }

    public function searchblog(RequestSearchBlog $request)
    {
              
        $blog = Blog::where('name_blog', 'like', '%' .$request->param. '%')->paginate(6);
      if($blog->count() >0){

        return view('user_m.loadView.blog.index_gridblog',compact('blog'));
      }
      else{
        $check = false;
        return view('user_m.loadView.blog.index_gridblog',compact('check'));
      }
    }
}
