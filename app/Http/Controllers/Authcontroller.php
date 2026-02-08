<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * ========================================
     * SHOW LOGIN FORM
     * ========================================
     */
    public function showLoginForm()
    {
        // If user is already logged in, redirect to home
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    /**
     * ========================================
     * AUTHENTICATE USER (LOGIN)
     * ========================================
     * 
     * How Auth::attempt() works:
     * 1. Takes credentials array (email, password)
     * 2. Finds user by email in database
     * 3. Uses Hash::check() to verify password against hashed password in DB
     * 4. If valid, creates a session and logs user in
     * 5. Returns true/false
     */
    public function authenticate(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        /**
         * Auth::attempt() does the following automatically:
         * - Retrieves the user by email
         * - Compares the plain password with hashed password using Hash::check()
         * - If valid, logs the user in and creates session
         * - Returns true if successful, false otherwise
         */
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to intended page or home
            return redirect()->intended(route('home'))
                ->with('success', 'Bienvenue ' . Auth::user()->name . ' !');
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * ========================================
     * SHOW REGISTRATION FORM
     * ========================================
     */
    public function showRegisterForm()
    {
        // If user is already logged in, redirect to home
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.register');
    }

    /**
     * ========================================
     * REGISTER NEW USER
     * ========================================
     */
    public function register(Request $request)
    {
        // Validate registration data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        /**
         * Create new user
         * Hash::make() automatically hashes the password using bcrypt
         * This is what Laravel uses internally for password hashing
         */
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        /**
         * Auth::login() manually logs in a user
         * - Takes a User model instance
         * - Creates a session for that user
         * - Sets Auth::user() to return this user
         */
        Auth::login($user);

        // Regenerate session for security
        $request->session()->regenerate();

        return redirect()->route('home')
            ->with('success', 'Compte créé avec succès ! Bienvenue ' . $user->name);
    }

    /**
     * ========================================
     * LOGOUT USER
     * ========================================
     */
    public function logout(Request $request)
    {
        /**
         * Auth::logout() does the following:
         * - Removes authentication data from session
         * - Clears the user from Auth::user()
         * - Marks the user as logged out
         */
        Auth::logout();

        // Invalidate the current session
        $request->session()->invalidate();

        // Regenerate CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Vous avez été déconnecté avec succès.');
    }

    /**
     * ========================================
     * SHOW USER PROFILE (Optional - for testing)
     * ========================================
     */
    public function profile()
    {
        /**
         * Auth::user() returns the currently authenticated user
         * Returns null if no user is logged in
         * This data comes from the session
         */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        return view('auth.profile', compact('user'));
    }
}