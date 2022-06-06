<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'username'=>'required|string|unique:users',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'gender'=>$request->gender,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        $token= $user->createToken('myAppToken')->plainTextToken;
        $res=[
            'user'=>$user,
            'token'=>$token
        ];
        if(url()->current()==url('/register')){
        
        return redirect('/dashboard')->with('success','User created successfully');
        }
        else  if(url()->current()==url('api/register/'))
        return response()->json(['user'=>$user,'token'=>$token]);
    }
    public function reg(){
        return view('auth.register');
    }
}
