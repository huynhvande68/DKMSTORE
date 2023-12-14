<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Products;
use App\Models\Admin\ProductImages;
use App\Models\Admin\Tags;
use App\Models\Admin\TagProducts;
use Illuminate\Http\Request;
use App\Http\Requests\RequestProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Traits\UpLoadFileStorageTrait;

class ProductController extends Controller
{
    use UpLoadFileStorageTrait;
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
         $products = Products::latest()->paginate(5);
        return view('admin.loadView.products.index',compact('products'));
    }
    public function create($id = ''){
        $htmlOption = Category::checkPartentId($id);   
        return view('admin.loadView.products.create', compact('htmlOption'));
    }

    public function store(RequestProduct $request)
    {
        try {
            DB::beginTransaction();
                $data =  $this->upStorageDontUser($request,'feature_image_path','product');
                $dataUpload = [
                    'name'  => $request->name_product,
                    'price' => $request->price_product,
                    'content' => $request->content,
                    'category_id' => $request->category_id,
                    'user_id' => auth()->id(),
                    'slug_product' => Str::slug($request->name_product,'-')
                ];
                if(!empty($data))
                    {    
                        $dataUpload['feature_image_path'] = $data['file_path'];
                        $dataUpload['feature_image_name'] = $data['file_name'];
                    }
        
                $res_product = Products::create($dataUpload);
        
                // Insert image_product
                foreach ($request->image_path as $imageItem) {
        
                    $data_multi =  $this->upStorageMultiple($imageItem,'product');
                    $res_product->img()->create([
                        'image_name' => $data_multi['file_name'],
                        'image_path' => $data_multi['file_path']
                    ]);
                }
                // Insert tag
        
                $tags = $request->tags;
                if(!empty($tags))
                {
                        foreach($tags as $tagitem)
                        {
                        $tag =  Tags::firstOrCreate(['name' => $tagitem]);
                            $tag_ids[] = $tag->id;
                        }
                        $res_product->tags()->attach($tag_ids);
                }                
                DB::commit();
                return redirect()->route('admin.product.show')->with('success','tạo sản phẩm thành công');
             }
              catch (\Exception $e) 
             {
                DB::rollBack();
                return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());
             }
    }

    public function edit( $id ){
        $product_e = Products::findOrFail($id);
        $htmlOption = Category::checkPartentId($product_e->category_id);

        return view('admin.loadView.products.edit',compact('htmlOption','product_e'));
    }

    public function update(RequestProduct $request, $id)
    {
        try {
       
          DB::beginTransaction();
          $res_product = Products::find($id);
          Storage::delete('public/product/'.$request->feature_image_name);
          foreach ($res_product->img as $imageItem) {        
              Storage::delete('public/product/'.$imageItem->image_name);
        }
          $data =  $this->upStorageDontUser($request,'feature_image_path','product');
          $dataUploadUpdate = [
              'name'  => $request->name_product,
              'price' => $request->price_product,
              'content' => $request->content,
              'category_id' => $request->category_id,
              'user_id' => auth()->id(),
              'slug_product' => Str::slug($request->name_product,'-')
          ];
          if(!empty($data))
              {    
                  $dataUploadUpdate['feature_image_path'] = $data['file_path'];
                  $dataUploadUpdate['feature_image_name'] = $data['file_name'];
              }
  
           $res_product->update($dataUploadUpdate);
          
          // Insert image_product
          ProductImages::where('product_id',$res_product->id)->delete();
          foreach ($request->image_path as $imageItem) {
  
              $data_multi =  $this->upStorageMultiple($imageItem,'product');
              $res_product->img()->create([
                  'image_name' => $data_multi['file_name'],
                  'image_path' => $data_multi['file_path']
              ]);
          }
          // Insert tag
  
          $tags = $request->tags;

          if(!empty($tags))
          {
                  foreach($tags as $tagitem)
                  {
                  $tag =  Tags::firstOrCreate(['name' => $tagitem]);
                      $tag_ids[] = $tag->id;

                  }
       
                $res_product->tags()->sync($tag_ids);
                  
                  
          }
          DB::commit();
          return redirect()->route('admin.product.show')->with('success','cập nhật sản phẩm thành công');
             }
              catch (\Exception $e) 
             {
                DB::rollBack();
                return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());
             }
    }

    public function delete($id)
    {
        try
        {
            $able = '';
            $res_delete = Products::find($id);
            Storage::delete('public/product/'.$res_delete->feature_image_name);
            foreach ( $res_delete->img as $imageItem) {        
                Storage::delete('public/product/'.$imageItem->image_name);
          }           
            $res_delete->delete();
            
         if($res_delete){
            $able =  response()->json([
                'code' => 200,
                'mess' => 'delete success',
                'id'   => $id 
            ],200);
         }
         else{
            $able =  response()->json([
                'code' => 500,
                'mess' => 'delete fail'
            ],500);
         }
         return $able;
        }
        catch(\Exception $e)
        {
             return Log::error("error".$e->getMessage());
        }
    }
}
