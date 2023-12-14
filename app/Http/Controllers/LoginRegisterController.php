<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestcheckInputRegister;
use App\Http\Requests\RequestCheckInputLogin;
use App\Models\Admin\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Notifications\Notifiable;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LoginRegisterController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    public function showLogin(){
        return view('admin.loadView.login_register.form_login');
    }
    public function showRegister(){
        return view('admin.loadView.login_register.form_register');
    }
    public function checkLogin(RequestCheckInputLogin $request){
        $remember = $request->has('remember_me') ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)){
             return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('error','Tài khoản hoặc Mật khẩu không chính xác');
        }
    }
    public function checkRegister(RequestcheckInputRegister $request){
       
        $use =  new User();
        $use->name = $request->name;
        $use->email = $request->email;
        $use->password = Hash::make($request->password);
        $use->save();
        
         return redirect()->back()->with('success','Đăng ký thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function forgot()
    {
        return view("admin.loadView.login_register.forgot_pass");
    }

    public function sendaMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user)
        {
            $passreset = PasswordReset::where('email',$user->email)->first();
            if($passreset)
            {
              
                PasswordReset::find($passreset->id)->update([
                    'email' => $user->email,
                    'token' => Str::random(60)
                ]);
            }else{
                PasswordReset::create([
                    'email' => $user->email,
                    'token' => Str::random(60)
                ]);
            }

                $passrese = PasswordReset::get();              
                $user->notify(new ResetPasswordRequest($passrese[0]->token));
            
            
           return redirect()->back()->with('success','vui long kiem tra email - hoac trong hom thu spam');
        }
        else{
            return redirect()->back()->with('error','khong ton tai email nay');
        }
    }

    public function reset($token )
    {  
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->created_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return redirect()->back()->with('error','token da het han');
        }
        if($passwordReset){
            return view("admin.loadView.login_register.form_pass",compact('token'));
        }
       
    }
    public function formreset()
    {
        return view("admin.loadView.login_register.form_pass");
    }
    public function confirmreset(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->tokenn)->firstOrFail();
         $user = User::where('email', $passwordReset->email)->firstOrFail();
            $updatePasswordUser = $user->update([
                'password' => Hash::make($request->pass)
            ]);
            $passwordReset->delete();

            return redirect()->route('user.login')->with('success','thay đổi mật khẩu thành công');
    }
}
