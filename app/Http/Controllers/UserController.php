<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function dashboard()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah pengguna tergabung dalam grup
        $userGroup = GroupMember::with('group')
            ->where('user_id', $user->id)
            ->first();

        return view('userpage.dashboard', compact('user', 'userGroup'));
    }
    public function team()
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah pengguna tergabung dalam grup
        $userGroup = GroupMember::with('group')
            ->where('user_id', $user->id)
            ->first();

        return view('userpage.team', compact('user', 'userGroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */




    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::all();
        return view('admin.userlist', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string', // Password bersifat opsional
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect(route('admin.user.list'))->with('success', 'Data pengguna berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.list')->with('success', 'User deleted successfully.');
    }
}
