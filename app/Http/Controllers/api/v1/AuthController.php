<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request){
        $cr = $request->only('email','password');
        $token = auth('api')->attempt($cr);//genaret token

        if(!$token) {
            return response()->json(['message' => "Unauthorized access"],401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);

        }

    public function refresh(){
        $refreshToken = auth('api')->refresh();
        return response()->json([
            'refresh_token' => $refreshToken,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);

    }

    public function me(){
        $user = auth('api')->user();
        return response()->json($user);
    }

    public function logout(){
        auth('api')->logout(true);
        return response()->json(['message' => 'logged out successfully']);
    }
}
