<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        // Check if the user is already authenticated
        if (auth()->check()) {
            // User is already logged in, redirect to the dashboard or another page
            return redirect()->route('verification');
        }

        // User is not logged in, show the login form
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Authentication
        if (Auth::attempt($request->only('username', 'password'))) {
            // Redirect to the dashboard upon successful login
            return redirect()->route('verification');
        } else {
            // Authentication failed, redirect back with errors
            return redirect()->route('welcome')->with(['error' => 'Invalid username or password']);
        }
    }
}
