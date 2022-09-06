<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Вы успешно зарегестрировались');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index')->with('success', 'Вы успешно вошли в аккаунт');
            } else {
                return redirect()->home()->with('success', 'Вы успешно вошли в аккаунт');
            }
        }
        return redirect()->back()->with('error', 'Неправельно введен email или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home()->with('success', 'Вы успешно вышли с учетной записи');
    }
}
