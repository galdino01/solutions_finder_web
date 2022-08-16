<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthApiController extends Controller {
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'required|string|min:4|max:16|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = new User([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => Str::random(60)
        ]);
        $user->save();
        return response()->json([
            'res' => '[OK] - User Created.'
        ], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (!Auth::attempt($credenciais)) {
            return response()->json([
                'res' => '[Error] - Access Denied.'
            ], 401);
        }
        $user = $request->user();
        $token = $user->createToken('Token')->accessToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'res' => '[OK] - Success Logout.'
        ]);
    }
}
