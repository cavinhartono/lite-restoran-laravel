<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(5);
        return view('user.index', compact(['users']));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact(['user']));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));
        return redirect('/user')->with('success', 'Menu sudah diupdatekan.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/menu')->with('success', "Menu sudah dihapuskan");
    }

    public function view()
    {
        $user = User::all();
        return view('food.view');
    }
}
