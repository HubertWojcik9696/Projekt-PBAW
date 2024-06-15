<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function updateRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'employee';
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Rola użytkownika zaktualizowana.');
    }
}
