<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view('merchant.auth.login', compact('pageTitle'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('merchant')->attempt($credentials)) {
            return redirect()->intended('/merchant/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('merchant')->logout();
        return redirect('/login');
    }



    public function showRegistrationForm()
    {
        $pageTitle = "Register";
        return view('merchant.auth.register', compact('pageTitle'));
    }

    // Handle merchant registration
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:merchants',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the merchant
        $merchant = Merchant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Authenticate the merchant
        Auth::guard('merchant')->login($merchant);

        // Redirect to the merchant dashboard
        return redirect()->route('merchant.dashboard')->with('success', 'Registration successful!');
    }
}
