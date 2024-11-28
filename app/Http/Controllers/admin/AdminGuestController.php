<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminGuestController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $users = User::when($keyword, function ($query, $keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $users->appends(['search' => $keyword]);

        return view('admin.guests.index', compact('users', 'keyword'));
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
            'phone_number' => 'required|numeric',
            'role' => 'required|in:admin,user',
        ]);

        $user->update($request->only('name', 'email', 'phone_number', 'role'));

        return redirect()->route('admin.guests')->with('success', 'User updated successfully!');
    }


    public function delete(User $user){

        $user->delete();

        return redirect()->route('admin.guests')->with('status', 'User Deleted');

    }
}