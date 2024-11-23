<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminGuestController extends Controller
{
    public function index()
    {

        return view('admin.guests.index', [
            'users' => User::paginate(8)
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.guests.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.guests')->with('success', 'User updated successfully!');
    }

    public function delete(User $user){

        $user->delete();

        return redirect()->route('admin.guests')->with('status', 'User Deleted');

    }
}