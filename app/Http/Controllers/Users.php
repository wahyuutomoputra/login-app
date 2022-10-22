<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember = true)) {
            $request->session()->regenerate();

            $user = Auth::user()->roles->name;
            if ($user == 'admin') return redirect('/users/homepage-admin');
            //tinggal ganti route
            //if ($user == 'staff') return redirect('/users/homepage-admin');
        }

        return redirect('users')->with(['errorLogin' => true, 'loginMessage' => 'Wrong password or email']);
    }

    public function homepageAdmin()
    {
        $user = Auth::user()->roles->name;
        print_r($user);
    }

    public function homepageStaff()
    {
        return view('homepage-staff');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('users');
    }
}
