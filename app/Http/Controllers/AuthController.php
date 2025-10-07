<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Ingrese un email válido',
            'password.required' => 'La contraseña es obligatoria'
        ]);

        $usuario = Usuario::where('email', $request->email)
                         ->where('activo', true)
                         ->first();

        if (!$usuario || !Hash::check($request->password, $usuario->passwordhash)) {
            throw ValidationException::withMessages([
                'email' => 'Las credenciales no coinciden con nuestros registros.'
            ]);
        }

        $usuario->ultimologin = now();
        $usuario->save();

        Auth::login($usuario, $request->filled('remember'));
        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:usuario,email',
            'nombreusuario' => 'required|string|max:100|unique:usuario,nombreusuario',
            'telefono' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.unique' => 'Este email ya está registrado',
            'nombreusuario.required' => 'El nombre de usuario es obligatorio',
            'nombreusuario.unique' => 'Este nombre de usuario ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'nombreusuario' => $request->nombreusuario,
            'telefono' => $request->telefono,
            'passwordhash' => Hash::make($request->password),
            'activo' => true
        ]);

        $usuario->roles()->attach(2);

        Auth::login($usuario);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}