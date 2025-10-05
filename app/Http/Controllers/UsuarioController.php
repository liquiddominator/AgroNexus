<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Mostrar listado de usuarios
     */
    public function index()
    {
        $usuarios = Usuario::with('roles')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Guardar un nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'email' => 'required|email|unique:usuario,email',
            'nombreusuario' => 'required|unique:usuario,nombreusuario',
            'telefono' => 'nullable|max:20',
            'passwordhash' => 'required|min:6',
            'activo' => 'boolean',
        ]);

        $usuario = Usuario::create($request->except('roles'));

        // Guardar roles asignados
        if ($request->has('roles')) {
            $usuario->roles()->sync($request->roles);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Mostrar un usuario
     */
    public function show($id)
    {
        $usuario = Usuario::with('roles')->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Formulario de edición
     */
    public function edit($id)
    {
        $usuario = Usuario::with('roles')->findOrFail($id);
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Actualizar un usuario
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'email' => 'required|email|unique:usuario,email,' . $usuario->usuarioid . ',usuarioid',
            'nombreusuario' => 'required|unique:usuario,nombreusuario,' . $usuario->usuarioid . ',usuarioid',
            'telefono' => 'nullable|max:20',
            'activo' => 'boolean',
        ]);

        $usuario->update($request->except('roles'));

        // Actualizar roles
        if ($request->has('roles')) {
            $usuario->roles()->sync($request->roles);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Eliminar un usuario
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->roles()->detach();
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}