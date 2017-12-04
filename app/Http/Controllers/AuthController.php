<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //
    public function authenticate(Request $request) {
    	//grab credentials
    	$credentials = $request->only('email', 'password');

    	try {
    		//attempt to verify credentials
    		if (!$token = JWTAuth::attempt($credentials)) {
    			return response()->json(['error' => 'invalid_credentials'], 401);
    		}
    	} catch (JWTException $e) {
    		//something went wrong :C
    		return response()->json(['error' => 'could_not_create_token'], 500);
    	}
    	return response()->json(['token' => 'Bearer'.$token]);
    }
}
