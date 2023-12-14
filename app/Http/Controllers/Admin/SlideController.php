<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slide;
use App\Traits\UpLoadFileStorageTrait;
class SlideController extends Controller
{
    use UpLoadFileStorageTrait;
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function __constructor(){

    }

    public function index(){
        $path_id = Slide::first();
        $path = Slide::where('id','>', $path_id->id)->get();
        
        return view('admin.loadView.slide.index',compact('path', 'path_id'));
    }
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $res =  $this->upStorage($request,'file','slide');
        Slide::create([
            'name_slide' => $imageName,
            'path' => $res['file_path'],
            'path_name' => $res['file_name']
        ]);
         return response()->json(['success'=>$imageName]);
    }
	
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        Slide::where('name_slide',$filename)->delete();
        return $filename;  
        
    }
	
}
