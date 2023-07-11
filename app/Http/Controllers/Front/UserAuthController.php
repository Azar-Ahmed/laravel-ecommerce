<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;


class UserAuthController extends Controller
{
    public function UserRegister()
    {
        $result['category_data'] = Category::latest()->get();
        return view('front.user_auth.user-register', $result);
    }

    public function UserLogin()
    {
        $result['category_data'] = Category::latest()->get();
        return view('front.user_auth.user-login', $result);
    }


    // POST

    public function UserRegisterSubmit(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
        ]); 

        $check_user = User::where('email', $request->email)
                            ->where('mobile', $request->mobile)
                            ->first();

        if($check_user){
            return response()->json(['status' => 403, 'msg' => 'User Already Exist']);
        }else{
            $model = new User();
            
            $model->first_name = $request->first_name;
            $model->last_name = $request->last_name;
            $model->email = $request->email;
            $model->mobile = $request->mobile;
            $model->password = $request->password;
            $model->address = $request->address;
            $model->city = $request->city;
            $model->state = $request->state;
            $model->country = $request->country;
            $model->pincode = $request->pincode;
            $model->save();
            return response()->json(['status' => 201, 'msg' => 'User Registered Successfully']);
        }

       
    }

    public function UserLoginSubmit(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result = User::where('email', $email)->first();
        if($result){
            //  if(Hash::check($password, $result->pwd)){
             if($password == $result->password){
                    $request->session()->put('UserLogin', true);
                    $request->session()->put('UserData', $result);
                    return response()->json(['status' => 200 ,'msg' => 'Welcome To Profile!']);
             }else{
                return response()->json(['status' => 400 ,'error_msg' => 'Please enter valid password!']);
             }
        }else{
          return response()->json(['status' => 400 , 'error_msg' => 'Please enter correct login details!']);
        }
    }
    
}
