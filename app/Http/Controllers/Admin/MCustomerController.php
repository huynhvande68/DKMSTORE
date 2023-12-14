<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use App\Models\Admin\Transaction;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class MCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
   
public function index(){
 
    $customer = Customer::get();  
    return view('admin.loadView.mcustomer.all_cus',compact('customer'));
}

public function detail($id)
{
    $customer = Customer::find($id);
   if($customer){
    return view('admin.loadView.mcustomer.detail',compact('customer'));
   }
   else{
       return redirect()->back();
   }
}

public function delete($id){

   try{
        $customer = Customer::find($id);
       if($customer)
       {
        $arr =  array();
        foreach($customer->order_customer as $item){
            $arr[$item->id] = $item->id;
        }
        Customer::find($id)->delete();
         $delete = Order::whereIn('id', $arr)->delete();
       
            $customer = Customer::get();  
            $cartComponent = view('admin.loadView.mcustomer.all_cus_recusi',compact('customer'))->render();
            return response()->json([
                'code' => 200,
                'main' => $cartComponent
            ],200);        

       }

   }catch(\Exception $e){

    return redirect()->back()->with('error',"message error system:".$e->getMessage().'Line :'.$e->getFile());

   }
}


}
