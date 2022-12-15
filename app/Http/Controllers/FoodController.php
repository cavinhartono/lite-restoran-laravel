<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return view('food.index');
    }

    public function add()
    {
        return view('food.create');
    }

    public function store(Request $request)
    {
        Food::create($request->expect('_token', 'submit'));
        return redirect('/menu')->with('success', 'Menu sudah ditambahkan.');
    }

    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit', compact(['food']));
    }

    public function update($id, Request $request)
    {
        $food = Food::find($id);
        $food->update($request->expect('_token', 'submit'));
        return redirect('/menu')->with('success', 'Menu sudah diupdatekan.');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect('/menu')->with('success', "Menu sudah dihapuskan");
    }

    public function view()
    {
        // $foods = Food::all();
        return view('food.view');
    }
}
