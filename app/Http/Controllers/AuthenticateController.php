<?php

namespace ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;


class AuthenticateController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['Error' => 'Unauthorized'], 401);
            }
        } catch (JWTExeption $e){
            return response()->json(['Error' => 'could_not_create_token'], 500);
        }
        
        $response = compact('token');
        $response['user'] = Auth::user();
        
        return $response;
    }
    
    public function Logout(){
        Auth::logout();
    }
}
