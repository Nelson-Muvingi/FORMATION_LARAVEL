<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(RegisterRequest $request)
    {
        // Valider et créer l'utilisateur
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Connecter automatiquement l'utilisateur après l'inscription
        Auth::login($user);

        // Rediriger vers la page d'accueil du blog
        return redirect()->route('blog.index')->with('success', 'Bienvenue ! Votre compte a été créé avec succès.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('blog.index'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Email invalide',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('auth.login');
    }
}
