<?php

namespace App\Http\Controllers\User_m;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Tags;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestSearchBlog;

class AboutController extends Controller
{


    public function index()
    {
        
        return view('user_m.loadView.about.aboutus');
    }
   
    public function contact()
    {
        return view('user_m.loadView.about.contact');
    }
}
