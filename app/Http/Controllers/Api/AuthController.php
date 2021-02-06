<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'lastname' => 'required',
            'image' => 'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed',
        ]);
        $validatedData['password']= bcrypt($request->password);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user'=> $user, 'access_token' => $accessToken]);

    }

    public function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
            $accessToken = $user->createToken('authToken')->accessToken;
        
            $response = [
                'user' => $user,
                'token' => $accessToken
            ];
        
             return response($response, 201);
    }

}
