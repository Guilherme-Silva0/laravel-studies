<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return $request->user();
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = $request->user();
    
            $user->tokens()->delete();
        
            $token = $user->createToken('authToken')->plainTextToken;
         
            return [
                'token' => $token,
                'token_type' => 'Bearer',
            ];
        }

        return response([
            'message' => 'Invalid login credentials',
        ], 401);
    }

    public function register(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $token = $user->createToken('authToken')->plainTextToken;
        
        return [
            'token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Successfully logged out',
        ];
    }
}
