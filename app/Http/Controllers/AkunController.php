<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    function show($id)
    {
        $data = User::findOrFail($id);
        return view('auth.akun', compact('data'));
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:20',
            'username' => 'required|string|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]+$/'
            ],
        ], [
            'password.regex' => 'Password harus mengandung minimal 1 huruf besar, 1 angka, dan 1 karakter spesial seperti @$!%*?&#.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftarkan user baru!');
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5|max:20',
            'username' => 'required|string|unique:users,username,' . $id,
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]+$/'
            ],
        ], [
            'password.regex' => 'Password harus mengandung minimal 1 huruf besar, 1 angka, dan 1 karakter spesial seperti @$!%*?&#.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validated['name'];
        $user->username = $validated['username'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Berhasil merubah data user!');
    }
}
