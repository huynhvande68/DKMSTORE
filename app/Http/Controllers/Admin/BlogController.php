<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tags;
use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\RequestBlog;
use Illuminate\Support\Facades\Auth;
use App\Traits\UpLoadFileStorageTrait;
use Illuminate\Support\Facades\Storage;
use PDO;

class BlogController extends Controller
{
    use UpLoadFileStorageTrait;
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        $blogs = Blog::latest()->paginate(6);
        return view('admin.loadView.blog.blog_all', compact('blogs'));
    }

    public function create()
    {
        $tags = Tags::get();
        return view('admin.loadView.blog.blog_create', compact('tags'));
    }

    public function store(RequestBlog $request)
    {

        $data =  $this->upStorageDontUser($request, 'file_blog', 'blog');
        $data_blog = [
            'name_blog' => $request->name_blog,
            'content' => $request->content,
            'author_id' => Auth::id()
        ];
        if (!empty($data)) {
            $data_blog['image_blog'] = $data['file_path'];
            $data_blog['image_name'] = $data['file_name'];
        }
        $blog = Blog::create($data_blog);

        $blog->blogs()->attach($request->blog_tags);

        if ($blog) {
            return redirect()->route('admin.blog')->with('success', 'tạo bài viết thành công');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {

        $blog = Blog::find($id);
        if ($blog) {
            $arr = array();
            foreach ($blog->blogs as $item) {
                $arr[$item->id] = $item->name;
            }
            $tags = Tags::whereNotIn('name', $arr)->get();
            return view('admin.loadView.blog.blog_edit', compact('blog', 'tags'));
        } else {
            return redirect()->back();
        }
    }

    public function update(RequestBlog $request, $id)
    {
        $blog_findId = Blog::find($id);
        if ($blog_findId) {
            Storage::delete('public/blog/' . $blog_findId->image_name);
            $data =  $this->upStorageDontUser($request, 'file_blog', 'blog');
            $data_blog = [
                'name_blog' => $request->name_blog,
                'content' => $request->content,
                'author_id' => Auth::id()
            ];
            if (!empty($data)) {
                $data_blog['image_blog'] = $data['file_path'];
                $data_blog['image_name'] = $data['file_name'];
            }
            $blog_findId->update($data_blog);
            $blog_findId->blogs()->sync($request->blog_tags);

            return redirect()->route('admin.blog')->with('success', 'cập nhật bài viết thành công');
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $removefile = Blog::find($id);
        Storage::delete('public/blog/' . $removefile->image_name);
        $delete = Blog::find($id)->delete();
        if ($delete) {
            $blogs = Blog::latest()->paginate();
            $cartComponent = view('admin.loadView.blog.blog_all_recusi', compact('blogs'))->render();
            return response()->json([
                'code' => 200,
                'main' => $cartComponent
            ], 200);
        }
    }
}
