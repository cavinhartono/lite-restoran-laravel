<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email harus disesuaikan',
                'password.required' => 'Password harus disesuaikan',
            ]
        );

        $get = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($get)) {
            $name = explode(' ', trim(Auth::user()->name))[0];
            return redirect('/')->with('success', "Selamat kembali, $name.");
        } else {
            return redirect('/auth')->withErrors('Email dan Password harus disesuaikan');
        }
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:user|email',
                'password' => 'required|min:8',
                'phone_number' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email sudah ada, mohon isi lagi',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password harus disesuaikan minimal 8 karakter',
                'phone_number.required' => 'Nomor telepon harus diisi',
            ]
        );

        $create = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone_number' => $request->phone_number
        ];

        if (Auth::attempt($create)) {
            return view('dashboard');
        } else {
            return redirect('/auth')->withErrors('Email dan Password harus disesuaikan');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth');
    }
}
