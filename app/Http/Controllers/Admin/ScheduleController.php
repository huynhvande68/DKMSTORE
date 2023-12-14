<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestSchedule;
use App\Jobs\ScheduleSendMail;
use App\Models\Admin\Customer;
use App\Models\Admin\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
  
    public function index()
    {
        $customer = Customer::get();
        return view('admin.loadView.schedule.schedule',compact('customer'));
    }

    public function createSchedule(Request $request)
    {
        $emails = $request->customer;      
       $res = ScheduleSendMail::dispatch($emails,$request->title,$request->content ,$request->daystart,$request->dayend);
       $res ?  redirect()->back()->with('success','gửi chương trình thành công') : redirect()->back()->with('error','gui chuong trinh that bai');
    }

}
