<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // =========================
    // TAMPILKAN DATA USER
    // =========================
    public function index()
    {
        $users = User::orderBy('id_user', 'desc')->get();

        return view('user.index', compact('users'));
    }


    // =========================
    // HALAMAN TAMBAH USER
    // =========================
    public function create()
    {
        return view('user.create');
    }


    // =========================
    // SIMPAN USER
    // =========================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

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
            'name' => $validated['name'],
            'username' => $validated['username'],

            // Password di-enkripsi
            'password' => Hash::make($validated['password']),

            'role' => $validated['role'],
        ]);

        return redirect('/admin/user')
            ->with('success', 'User berhasil ditambahkan.');
    }


    // =========================
    // HALAMAN EDIT USER
    // =========================
    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);

        return view('user.edit', compact('user'));
    }


    // =========================
    // UPDATE USER
    // =========================
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

        // Kalau password diisi, password diganti
        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect('/admin/user')
            ->with('success', 'User berhasil diubah.');
    }


    // =========================
    // HAPUS USER
    // =========================
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        $user->delete();

        return redirect('/admin/user')
            ->with('success', 'User berhasil dihapus.');
    }
}