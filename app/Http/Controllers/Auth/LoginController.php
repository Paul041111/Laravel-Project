<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Attempt to log the user in.
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $request->email)->first();
        if (!$user && $user->password != $password) {
        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
        Auth::login($user);
        // Prevent session fixation attacks.
        $request->session()->regenerate();

        return redirect()->intended(route('articles.index'));
    }

    /**
     * Log the user out.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('articles.index');
    }
}
