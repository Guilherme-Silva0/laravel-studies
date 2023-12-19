<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        return Auth::user();
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
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
}
