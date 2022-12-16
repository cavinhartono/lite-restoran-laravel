<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('food.edit', compact(['food']));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->expect('_token', 'submit'));
        return redirect('/menu')->with('success', 'Menu sudah diupdatekan.');
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
