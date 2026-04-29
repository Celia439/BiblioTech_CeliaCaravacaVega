<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //Utilizar la clase FacadeAuth
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirigir según el rol del usuario
            if (Auth::user()->rol === 'bibliotecario' || Auth::user()->rol === 'admin') {
                return redirect('/bibliotecario');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        //Cerrar sesión
        Auth::logout();
        //Borrar toda la info de la sesión
        $request->session()->invalidate();
        //Regenerar Token CSRF (verifica que los formularios se rellenan por el usuario)
        $request->session()->regenerateToken();
        //redireccionar a inicio 
        return redirect('/');
    }
}
