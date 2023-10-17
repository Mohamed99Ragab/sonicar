<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login(LoginRequest $request){


        $user = User::where('email',$request->email)->first();

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember_me)){

            Auth::guard('web')->login($user);

            session()->flash('success','login to admin panel success');
            return redirect()->route('dashboard');
        }

        session()->flash('error','email or password not correct');
        return redirect()->back();


    }

    public function logout(){

        Auth::logout();

        return redirect()->route('login');

    }


}
