<?php

namespace App\Http\Controllers\User_m;

use App\Http\Requests\RequestRegisterCustomer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLoginCustomer;
use App\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\View\Components;

class LgCustomer extends Controller
{
    public function __construct(){
        $this->middleware('guest:customer')->except('logout');
    }
    public function showLogin(){
        return view('user_m.loadView.login.login');
    }
    public function showRegister(){
        return view('user_m.loadView.login.register');
    }
    public function checkLogin(RequestLoginCustomer $request){

        $remember = $request->has('remember_me') ? true : false;
        if(Auth::guard('customer')->attempt(['name' => $request->name, 'password' => $request->password],$remember)){
             return redirect()->route('my_account');
        }else{
            return redirect()->back()->with('error','Tài khoản hoặc Mật khẩu không chính xác');
        }
    }
    public function checkRegister(RequestRegisterCustomer $request){
       
        $use =  new Customer();
        $use->name = $request->name;
        $use->email = $request->email;
        $use->password = Hash::make($request->password);
        $use->notification = 0;
        $use->save();
        
         return redirect()->route('customer.login')->with('success','Đăng ký thành công');
    }
}
