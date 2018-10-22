<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', trim($request->input('email')))->first();
        if (!$user) {
            return redirect('/auth')->withErrors('This email is not valid');
        } else {
            Auth::login($user);
            return redirect('/');
        }
    }
}
