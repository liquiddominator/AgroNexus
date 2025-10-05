<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'usuarios' => Usuario::count(),
            'roles' => Rol::count(),
        ]);
    }
}