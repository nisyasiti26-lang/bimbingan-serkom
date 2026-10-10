<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
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
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'username.max' => 'Username maksimal 255 karakter.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',

            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
        ]);

        User::create([
            'name' => $validated['username'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('admin.user.index')
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
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'username.max' => 'Username maksimal 255 karakter.',

            'password.min' => 'Password minimal 6 karakter.',

            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
        ]);

        $data = [
            // name tetap mengikuti username
            'name' => $validated['username'],
            'username' => $validated['username'],
            'role' => $validated['role'],
        ];

        // Password hanya diubah jika diisi
        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diubah.');
    }


    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        // Jangan izinkan menghapus akun yang sedang login
        if (session('user_id') == $id_user) {
            return redirect()
                ->route('admin.user.index')
                ->with(
                    'error',
                    'Akun yang sedang digunakan tidak dapat dihapus.'
                );
        }

        // Ambil ID user yang sedang login
        $adminId = session('user_id');

        // Pindahkan berita milik user yang akan dihapus
        // ke user yang sedang login
        Berita::where('id_user', $id_user)
            ->update([
                'id_user' => $adminId
            ]);

        // Hapus user
        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil dihapus.');
    }
}