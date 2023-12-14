<?php

namespace App\Http\Controllers\User_m;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Customer;
use App\Models\Admin\Products;
use App\Models\Admin\Province;
use App\Models\Admin\District;
use App\Models\Admin\Order;
use App\Models\Admin\Coupon;
use App\Models\Admin\NotificationFake;
use App\Models\Admin\Transaction;
use App\Models\Admin\order_detail;
use App\Events\Orderproduct;
use App\Http\Requests\RequestPayment;
use Illuminate\Http\Request;
use DB;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller
{
    private $html='';

    public function index()
    {    
   
        $customer = Auth::guard('customer')->user();
        $province = Province::get();
        $cart = session()->get('cart');
        if(isset($customer)){

            return view('user_m.loadView.cartproduct.checkout',compact('customer','province','cart'));

           }
           else{
               return redirect()->route('customer.login');
           }
       
    }

    public function check_province(Request $request)
    {
       
        if(empty($request->number)){
            
        }
        else
        {
            $province = Province::find($request->number);

            foreach($province->province_to_district as $item){
                $this->html.="<option  value = '". $item['id'] ."'>".$item['name_district']."</option>"; 
            }

            return response()->json([
                'code' => 200,
                'message' => 'Đã thêm vào giỏ hàng',
                'html' =>  $this->html
            ],200);
        }
    }

    public function check_wards(Request $request)
    {
       
        if(empty($request->number)){
            
        }
        else
        {
            $wards = District::find($request->number);

            foreach($wards->district_to_wards as $item){
                $this->html.="<option  value = '". $item['id'] ."'>".$item['name_wards']."</option>"; 
            }

            return response()->json([
                'code' => 200,
                'message' => 'Đã thêm vào giỏ hàng',
                'html' =>  $this->html
            ],200);
        }
    }

    public function payment_order(Request $request)
    { 
     
       try
       {
        DB::beginTransaction();
        //get session
        $total = 0;
        $cart = session()->get('cart');        
        foreach($cart as $key => $item)
        {
          $total += $item['price']*$item['quantity'];          
        }
        $dis = $this->checkCoupon($request->cuppon_code , $total );
        
         $order = Order::create([
            'shipping' => 20000,
            'total' => $total,
            'wards_id' => $request->wards,
            'payment' => $request->payment_option,
            'total_discount' => $dis[1],
            'address' => $request->adders,
            'note' => $request->note
        ]);
       
        //add order detail
        foreach($cart as $key => $item)
        {
         order_detail::create([
            'name' => $item['name'],
            'price' =>$item['price'],
            'quantity' =>$item['quantity'],
            'qr_code_id' => $dis[0],
            'order_id' => $order->id,
            'order_product_id' => $key
           
        ]);
       }

       // add transaction
       $information_customer = Auth::guard('customer')->user();
      $order->order_transaction()->attach($information_customer->id);


    // notification
    $transaction = Transaction::latest()->first();
    $inf = $transaction->cus; 
    $notifake = NotificationFake::create([
        'nid_customer' => $inf->id,
        'norder_id' => $transaction->orders_id,
        'name_cus' =>  $inf->name,
        'nimg' => $inf->image
    ]);
    
    // redis
     broadcast(new Orderproduct($notifake));
    session()->pull('cart');    
   // end redis

        DB::commit();
        return view('user_m.loadView.cartproduct.complete');
        
       }
       catch (\Exception $e) 
       {
          DB::rollBack();
          return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());
       }
    }
    public function checkCoupon($request ,$total )
    {
        if($request != null)
        {
         $code =  Coupon::where('coupon_code',$request)->first();           
         $codess =   $code->id;     
            if($code->coupon_select == 2)
                {
                    $dis = $total - $code->coupon_detail;                    
                }
            if($code->coupon_select == 1)
                {
                    $dis = $total / $code->coupon_detail;                    
                }
        }
        else{
            $codess = NULL;
            $dis = $total;
        }
        $ar = array();
        $ar[0] = $codess;
        $ar[1] = $dis;
        if($ar[1] <= 0)
        {
            $ar[1] = 20000;   
        }
        return $ar;
    }

}