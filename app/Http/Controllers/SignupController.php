<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
    public function create()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'usertype' => 'required|in:verifier,processor,supervisor,programmer',
        ]);
    
        // Create the user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'usertype' => $request->usertype,
        ]);
    
        // Redirect to login page or wherever you want
        return redirect()->route('welcome');
    }
}
