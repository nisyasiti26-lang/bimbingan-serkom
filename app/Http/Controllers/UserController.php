<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id_user', 'desc')->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }


   public function store(Request $request)
   {
    $validated = $request->validate([
        'username' => [
            'required',
            'string',
            'max:255',
            'unique:user,username'
        ],
        'password' => [
            'required',
            'string',
            'min:6'
        ],
        'role' => [
            'required',
            'in:admin,operator'
        ],
    ]);

    User::create([
        'username' => $validated['username'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    return redirect('/admin/user')
        ->with('success', 'User berhasil ditambahkan.');
}

    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                'unique:user,username,' . $user->id_user . ',id_user'
            ],

            'password' => [
                'nullable',
                'string',
                'min:6'
            ],

            'role' => [
                'required',
                'in:admin,operator'
            ],
        ]);

        $data = [
            'name' => $validated['name'],
            'username' => $validated['username'],
            'role' => $validated['role'],
        ];

        // Jika password diisi, password akan diubah
        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect('/admin/user')
            ->with('success', 'User berhasil diubah.');
    }

    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        $user->delete();

        return redirect('/admin/user')
            ->with('success', 'User berhasil dihapus.');
    }
}