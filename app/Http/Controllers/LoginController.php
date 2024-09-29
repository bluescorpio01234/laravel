<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        $loginDetails = $request->validate([
            'email' => 'required|email', 
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($loginDetails)) {
        return redirect(route('user.index'));

        
           
        }

      
        return back()->withErrors([
            'email' => 'the email does not match.',
            'password' => 'Incorrect password'
        ])->withInput();
    }
}
