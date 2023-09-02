<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authenticate\UserLoginRequest;
use App\Http\Requests\Authenticate\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function userRegister(UserRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function userLogin(UserLoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json(['token' => $token]);
        }
    
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
