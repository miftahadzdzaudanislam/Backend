<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Metode untuk registrasi user
    public function register(Request $request) {
        // menangkap inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        // menginsert data ke tabel user
        User::create($input);

        $data = [
            'message' => 'User berhasil dibuat'
        ];

        return response()->json($data, 200);
    }

    // Metode untuk login user
    public function login(Request $request) {
        // menangkap inputan useer
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Menangkap data user (DB)
        $user = User::where('email', $input['email'])->first();

        // Membandingkan inputan user dengan data user (DB)
        $loginSukses = $user && Hash::check($input['password'], $user->password);

        if ($loginSukses) {
            // membuat token
            $token = $user->createToken('auth_token');
            
            $data = [
                'message' => 'Login berhasil',
                'token' => $token->plainTextToken
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Email atau password salah'
            ];

            return response()->json($data, 401);
        }
    }
}
