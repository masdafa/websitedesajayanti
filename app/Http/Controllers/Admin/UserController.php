<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if (!in_array($role, ['admin', 'pengurus_rt'])) {
            abort(403, 'Akses ditolak.');
        }
        
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function editPassword(User $user)
    {
        $role = auth()->user()->role;
        if (!in_array($role, ['admin', 'pengurus_rt'])) {
            abort(403, 'Akses ditolak.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $role = auth()->user()->role;
        if (!in_array($role, ['admin', 'pengurus_rt'])) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Password pengguna berhasil diubah.');
    }
}
