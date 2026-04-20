<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function historial()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('usuario.reservas');
    }

    public function index()
    {
        return view('bibliotecario.reservas');
    }
}
