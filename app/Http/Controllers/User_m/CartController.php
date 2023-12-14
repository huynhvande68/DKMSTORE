<?php

namespace App\Http\Controllers\User_m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\Admin\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        $carts = session()->get('cart');
        return view('user_m.loadView.cartproduct.cart',compact('carts'));
    }

    public function addCart(Request $request ,$id)
    {
      
        //   session()->flush('cart');
        //            echo "<pre>";
        //   print_r(session()->get('cart'));
         
        $product = Products::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] +=$request->quantity;
        }
        else{
    
            $cart[$id] = [
                'name'      =>$product->name,
                'price'     =>$product->price,
                'image'     =>$product->feature_image_path,
                'quantity'  =>$request->quantity,
                `amount` =>$request->amount

            ];
        }
          session()->put('cart',$cart);  

          $sum = 0;
          $session = session()->get('cart');
    foreach( $session as $item){
        $sum+=$item['quantity'];
    }
      
    
     return response()->json([
         'code' => 200,
         'message' => 'Đã thêm vào giỏ hàng',
         'num' => $sum
     ],200);
    
    }

    public function updateCart(Request $request)
    {
      
        $carts = session()->get('cart');
       $arr = count($request->val);
       $stt = count($request->stt);
        for($i = 0 ; $i < $arr ; $i++)
        {
             $carts[$request->stt[$i]]['quantity'] = $request->val[$i];                        
        }
        session()->put('cart',$carts);
        $carts = session()->get('cart');
        $cartComponent = view('user_m.loadView.cartproduct.udcart',compact('carts'))->render();
         return response()->json([
             'code' => 200,
             'cartComponent' => $cartComponent,
             'message' => 'Đã thêm vào giỏ hàng'

         ],200);
    }
  
    public function deleteCart($id){
        $carts = session()->get('cart');
        unset($carts[$id]);
        session()->put('cart',$carts);
        $carts = session()->get('cart');
        $cartComponent = view('user_m.loadView.cartproduct.udcart',compact('carts'))->render();
         return response()->json([
             'code' => 200,
              'cartComponent' => $cartComponent,
             'message' => 'Đã thêm vào giỏ hàng'

         ],200);
        
    }
    
}
