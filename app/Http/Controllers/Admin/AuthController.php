<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AuthController extends Controller
{
    public function Login(Request $request)
    {
        if($request->session()->has('AdminLogin')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.auth.login');
        }
    }
    
    public function LoginSubmit(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result = Admin::where('email', $email)->first();
        if($result){
             if($password === $result->password){
                $request->session()->put('AdminLogin', true);
                $request->session()->put('AdminID', $result->id);
                $request->session()->put('AdminName', $result->name);
                $request->session()->put('AdminEmail', $result->email);
                return redirect('admin/dashboard')->with('success_msg', 'Welcome To Dashboard');
             }else{
                return redirect('admin/login')->with('error', 'Please enter valid password!');  
             }
        }else{
          return redirect('admin/login')->with('error', 'Please enter correct login details');  
        }
    }
}
