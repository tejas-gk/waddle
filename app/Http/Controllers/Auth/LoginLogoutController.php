<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginLogoutController extends Controller
{
    public function login(Request $request){
        // $request->validate([
        //     'email' => 'required|string|email|max:255',
        //     'password' => 'required|string|min:6',
        // ]);
        // $credentials = request(['email', 'password']);
        // if(!Auth::attempt($credentials))
        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // $token->save();
        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);
        $fields=$request->validate(
            [
                'email'=>'required|string|email',
                'password'=>'required|string'
            ]
        );
        $user=User::where('email',$fields['email'])->first();
        if(!$user){
            return response()->json([
                'message'=>'User not found'
            ],404);
        }
        if(!Hash::check($fields['password'],$user->password)){
            return response()->json([
                'message'=>'Password does not match'
            ],404);
        }
        $tokenResult = $user->createToken('Personal Access Token')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token'=>$tokenResult
        ]);
        
    }
    
    public function logout(Request $request){
        $request->user()->token()->revoke();
        // auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
