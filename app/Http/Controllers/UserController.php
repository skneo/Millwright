<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function showLoginForm()
    {
        if (session()->has('username')) {
            return redirect('/');
        } else {
            return view('login');
        }
    }
    function login(Request $req)
    {
        $email = $req['email'];
        $password = $req['password'];
        $users = User::where('email', $email)->get();
        if (count($users) == 1) {
            $user = $users[0];
            if ($user->password == $password) {
                session(['username' => $user->name]);
                session(['user_id' => $user->id]);
                return redirect('/');
            } else {
                $req->session()->flash('danger', 'Wrong password');
                return redirect('/login');
            }
        } else {
            $req->session()->flash('danger', 'No registered user with email ' . $email);
            return redirect('/login');
        }
    }
    function logout(Request $req)
    {
        $req->session()->forget('username');
        $req->session()->forget('user_id');
        return redirect('/');
    }
    function updatePassword(Request $req)
    {
        $user = User::find(session('user_id'));
        $user->password = $req['pwd1'];
        $user->save();
        $req->session()->flash('success', "Password changed");
        return redirect('/');
    }
}
