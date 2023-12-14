<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Transaction;
use App\Models\Admin\NotificationFake;
use App\Models\Admin\Order;
use App\Models\Admin\order_detail;
use App\Models\Admin\Statiscial;
use DB;
use Carbon\Carbon;


class ManagerOrder extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index(){
        $or = Transaction::latest()->get();
        return view('admin.loadView.order.index',compact('or'));
    }

    public function detail($idorder){
        $order = Order::find($idorder);
        if(!isset($idorder)){
           return redirect()->route('admin.morder');
        }else{
            $info_cus= $order->order_transaction;
            $wards = $order->ward;
            $distric =$wards->belongDistrict;
            $province = $distric->belongProvince;

            return view('admin.loadView.order.detail',compact('order','info_cus','wards','distric','province'));
        }
    }

    public function pdf($id){
        $order = Order::find($id);
        $info_cus= $order->order_transaction;
        $wards = $order->ward;
        $distric =$wards->belongDistrict;
        $province = $distric->belongProvince;
        return view('admin.loadView.order.convespdf',compact('order','info_cus','wards','distric','province'));
    }
    
    public function confirmOrder($id){
        try{

            DB::beginTransaction();
            Transaction::find($id)->update([
                'status' => 1,
                'payment-success' =>1
            ]);
    
            $day = Transaction::find($id);
            $num = 0;
            foreach($day->tranor->order_order_detail as $item){
                $num+=$item->quantity;
            }
            $total_price =$day->tranor->total_discount ;
            $period = Carbon::parse($day->created_at)->format('Y/m/d');

            $checkday =  Statiscial::where('period',$period)->first();            
            if(isset($checkday)){
                Statiscial::find($checkday->id)->update([
                    'total_quantity' => ($num )+($checkday->total_quantity),
                    'total_price' => ($day->tranor->total_discount)+($checkday->total_price),                
                ]);
            }
            else
            {
                 Statiscial::create([
                    'total_quantity' => $num,
                    'total_price' =>$total_price,
                    'period' =>  $period
                ]);
        
            }

    
            DB::commit();
            return response()->json([
                'code' => 200,
                'mess' => 'Đã thêm vào giỏ hàng'
            ],200);
        }
        catch (\Exception $e) 
        {
           DB::rollBack();
           return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());
        }
    }
    
    public function removeconfirmOrder($id){
       $remove = Transaction::find($id);
      $re =  Order::find($remove->orders_id)->delete();
       $or = Transaction::latest()->get();
       if($or){
        $cartComponent = view('admin.loadView.order.cursive_index',compact('or'))->render();
        return response()->json([
            'code' => 200,
            'main' => $cartComponent,
            'mess' => 'Đã thêm vào giỏ hàng'
        ],200);
       }
    }

    public function readNotification($id){
        $check = NotificationFake::where('norder_id',$id)->update(
           [ 'read_at' => Carbon::now('Asia/Ho_Chi_Minh')]
        );

        if($check) {
            return redirect()->route('admin.order.morder');
        }
    }
}
