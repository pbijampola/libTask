<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     /**
     * @group Authentication
     * Authenticated customer
     * @bodyParam email string required The email of the user. Example:patrickbijampola@gmail.com
     * @bodyParam password string required The password of the user. Example:********
     * @response {
     * "user": {
     * "id": 1,
     * "name": "Patrick Bijampola",
     * "email": "patrickbijampola@gmail.com",
     * "email_verified_at": null,
     * "created_at": "2021-05-05T09:00:00.000000Z",
     * "updated_at": "2021-05-05T09:00:00.000000Z"
     * },
     *
     */
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
