<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::user()){
            return redirect('dashboard');
        }
        else{
            return view('admin.login');
        }
    }
    public function postLogin(Request $request){
        $remember = null;
        if ($request->remember == 'on') {
            $remember = true;
        }
        else{
            $remember = false;
        }
        
        $arr = [
            'email' => $request->email,
            'password' => $request->password,  
        ];
        if(Auth::attempt($arr, $remember)){
            return redirect('dashboard');
        }
        else{
            return back();
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect('admin');
    }

}