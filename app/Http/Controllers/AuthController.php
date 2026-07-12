<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $validated = $request->validated();
        $user = User::where('email',$validated['email'])->first();
        if(!$user){

            return response()->json([
                'message'=>'email not found'
            ],401);
        }
        if(!Hash::check($validated['password'],$user->password)){
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

    public function register(RegisterRequest $request){
        $validated = $request->validated();
       $user = User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password'],
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
