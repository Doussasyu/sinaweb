<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Datatables\UsersDataTable;
// use App\Http\Controllers\UsersDataTable;

class UserController extends Controller
{

    public function dashboard()
    {
        // Ambil semua data pengguna dari tabel users
        $users = User::all();

        // Kirim data pengguna ke view
        return view('dashboard', compact('users'));
    }


    // public function index()
    // {
    //     $users = User::all();
    //     //$users = User::paginate(10); // Atur 10 pengguna per halaman
    //     return view('dashboard', compact('users'));
    // }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil dibuat!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'Berhasil menghapus.');
    }
}
