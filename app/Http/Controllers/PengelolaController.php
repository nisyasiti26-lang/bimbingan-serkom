<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PengelolaController extends Controller
{
    //
    public function index(){
        $data['pengelola'] = User::all();
        return view('admin.pengelola.index', $data);
    }

    public function create(){
        return view('admin.pengelola.create');
    }

    public function store(){
       $request->validate([
         'name' => 'required|string|min:6',
         'username' => 'required|string|unique:user,username',
         'password' => 'reuired|string',
         'role' => 'required|in:admin,operator'
       ]);

       User::create([
         'name' => $request->name,
         'username' => $request->username,
         'password' => bcrypt($request->password),
         'role' => $request->role
       ]);

    }

}
