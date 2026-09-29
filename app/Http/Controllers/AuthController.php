<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return back()
                ->withErrors([
                    'username' => 'Username atau password salah.'
                ])
                ->withInput();
        }

        $request->session()->regenerate();

        session([
            'user_id' => $user->id_user,
            'username' => $user->name,
            'role' => $user->role,
        ]);


        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/login');
    }
}