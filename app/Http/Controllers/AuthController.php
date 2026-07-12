<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $requsest){
        $user = User::where('email',$requsest->email)->first();
        if(!$user){

            return response()->json([
                'message'=>'email not found'
            ],401);
        }
        if(!Hash::check($requsest->password,$user->password)){
            return response()->json([
                'message'=>'Invalid password'
            ],401);
        }
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'message'=>'User logged in successfully',
            'token'=>$token,
            'user'=>$user,
        ]);

    }

    public function register(Request $request){
       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'message'=>'User registered successfully',
            'token'=>$token,
            'user'=>$user,
        ]);

    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        // auth()->user()->tokens()->delete();
        return response()->json([
            'message'=>'User logged out successfully',
        ]);
    }
}
