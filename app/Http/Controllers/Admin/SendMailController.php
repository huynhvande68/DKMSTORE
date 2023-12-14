<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use App\Models\Admin\Coupon;
use App\Http\Requests\RequestCheckBox;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
  
    public function index()
    {
       $customer = Customer::get();
       $coupon = Coupon::get();
      if(isset($customer) || isset($coupon)){

          return view('admin.loadView.sendmail.index',compact('customer','coupon'));
      }else{
          return redirect()->back();
      }
    }
    // public function test()
    // {
    //     $coupon = Coupon::find(15);
    //       return view('admin.loadView.sendmail.templete',compact('coupon'));
    
    // }
	
    public function send(RequestCheckBox $request)
    {
        // $emails = $request->customer;
        // $coupon = Coupon::find($request->coupon);      
        // Mail::send('admin.loadView.sendmail.templete', 
        // [
        //    'coupon' => $coupon
        // ], function($message) use ($emails)
        // {    
        //     $message->to($emails)->subject('This is test e-mail');    
        // });
        $emails = $request->customer;
        $coupon = Coupon::find($request->coupon);            
        $kq = SendEmail::dispatch($emails , $coupon)->delay(Carbon::now()->addMinutes(5));
        if($kq)
        {
            return redirect()->back()->with('success','Mã giảm giá đã được gửi thành công');
        }
        else{
            return redirect()->back()->with('error','Lỗi !! ');
        }
    }
}
