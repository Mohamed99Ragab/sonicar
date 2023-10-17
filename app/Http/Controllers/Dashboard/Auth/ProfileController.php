<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\b;

class ProfileController extends Controller
{
    use FileManagementTrait;
    public function index(){

        return view('dashboard.auth.profile');
    }


    public function update(Request $request)
    {

        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email,'.Auth::id(),
            'photo'=>'image',
            'password'=>'confirmed'

        ]);

        $user = User::find(Auth::id());

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,

        ]);

        if($request->password){

            $user->update([
                'password'=>Hash::make($request->password)
            ]);
        }

        if($request->file('photo')){

           $fileName = $this->storeFile('uploads/users',$request->file('photo'));

            $user->update([
                'photo'=>$fileName
            ]);
        }

        toast('Profile is updated successfully','success');
        return back();




    }
}
