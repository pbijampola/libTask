<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user=User::where('email', $request->email)->first();
      if(!$user || !Hash::check($request->password, $user->password)){
          return response([
              'message' => ['These credentials do not match our records.']
          ], 404);
      }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
            'message' => 'Logged in successfully'
        ];
        return response($response, 201);
}
}
