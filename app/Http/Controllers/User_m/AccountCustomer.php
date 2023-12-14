<?php

namespace App\Http\Controllers\User_m;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Admin\Transaction;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestEditmyAccount;
use Illuminate\Support\Facades\Hash;
use App\Traits\UpLoadFileStorageTrait;
use Illuminate\Http\Request;
use Psy\Readline\Transient;

class AccountCustomer extends Controller
{
    use UpLoadFileStorageTrait;

    public function index()
    {
        $information_customer = Auth::guard('customer')->user();
        if(isset($information_customer)){
           $transs = Transaction::where('customer_id',$information_customer->id)->latest()->get();
            if(isset($transs)){
                return view('user_m.loadView.my_account.myaccount',compact('information_customer','transs'));
            }
            else{
                return view('user_m.loadView.my_account.myaccount',compact('information_customer','show_err'));
            }
       }
       else{
           return redirect()->route('customer.login');
       }
    }
  
    public function edit()
    {
        $information_customer = Auth::guard('customer')->user();
        return view('user_m.loadView.my_account.editmyaccount',compact('information_customer')); 
    }
    public function update(RequestEditmyAccount $request )
    {
        //check use login currrently
        $information_customer = Auth::guard('customer')->id();       
        $cus =  Customer::find($information_customer);
        $data =  $this->upStorageCustomer($request,'image_ok','customer');
        if($data == null){
            $data['file_path'] = $cus->image;
        }
        if (Hash::check($request->password_current , $cus->password )) {
            
             Customer::find($information_customer)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'sex' => $request->sex,
                'image' => $data['file_path'],
                'mobiephone' => $request->phonenumber,
                'notification' => 0
            ]);
            return redirect()->route('my_account')->with('success','Cập nhật thành công!');

           }
           else{

            return redirect()->back()->with('error','mat khau cu khong chinh xac');  

           }
       
    }

    public function detailorder($id)
    {
        $order = Order::find($id);
        $info_cus= $order->order_transaction;
        $wards = $order->ward;
        $distric =$wards->belongDistrict;
        $province = $distric->belongProvince;
        return view('user_m.loadView.my_account.jonhney',compact('order','info_cus','wards','distric','province'));
    }

    public function errorder($id)
    {
      $up = Transaction::find($id)->update([
          'status' => 2,
          'payment-success' => 2
      ]);
      if($up){
        $information_customer = Auth::guard('customer')->user();
        $transs = Transaction::where('customer_id',$information_customer->id)->get();
        $cartComponent = view('user_m.loadView.my_account.recusive_show_order',compact('information_customer','transs'))->render();
        return response()->json([
            'code' => 200,
            'main' =>$cartComponent,
            'mess' =>'Đã thêm vào giỏ hàng'
        ],200);
      }

    }
}
