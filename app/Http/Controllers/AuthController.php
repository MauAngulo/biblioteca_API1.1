<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    //
    public function authenticate(Request $request)
    {
​​    	// grab credentials from the reques
		$credentials = $request->only('email', 'password');

		try
		{
		// attempt to verify the credentials and create a token for the user
			if (!$token = JWTAuth::attempt($credentials))
			{
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		}
		catch (JWTException $e)
		{
		// something went wrong whilst attempting to encode the token
			return response()->json(['error' => 'could_not_create_token'], 500);
		}
		// all good so return the token
		return response()->json(['token' => 'Bearer '. $token]);
	}
}