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
    function requestOTP(Request $req)
    {
        $email = $req['email'];
        $users = User::where('email', $email)->get();
        if (count($users) == 1) {
            $user = $users[0];
            $otp = random_int(100000, 999999);
            session(['otp' => $otp]);
            session(['user_id' => $user->id]);
            //emailing otp with rapid api

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://rapidprod-sendgrid-v1.p.rapidapi.com/mail/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\r\n    \"personalizations\": [\r\n        {\r\n            \"to\": [\r\n                {\r\n                    \"email\": \"$email\"\r\n                }\r\n            ],\r\n            \"subject\": \"OTP to reset password on Millwright Portal\"\r\n        }\r\n    ],\r\n    \"from\": {\r\n        \"email\": \"knockdeveloper@gmail.com\"\r\n    },\r\n    \"content\": [\r\n        {\r\n            \"type\": \"text/plain\",\r\n            \"value\": \"OTP to reset password at Millwright portal is $otp\"\r\n        }\r\n    ]\r\n}",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: rapidprod-sendgrid-v1.p.rapidapi.com",
                    "X-RapidAPI-Key: d2cc0cd025msh8db8663d3a919cdp136023jsnf1a181cdfff0",
                    "content-type: application/json"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
            $req->session()->flash('success', "OTP sent to $email");
            return redirect('/reset-password');
        } else {
            $req->session()->flash('danger', 'No registered user with email ' . $email);
            return redirect('/login');
        }
    }
    function resetPassword(Request $req)
    {
        if (session('otp') == $req['otp']) {
            $user = User::find(session('user_id'));
            $user->password = $req['pwd1'];
            $user->save();
            $req->session()->flash('success', "Password changed");
            return redirect('/login');
        } else {
            $req->session()->flash('danger', 'Wrong OTP entered');
            return redirect('/login');
        }
    }
}
