<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Lote;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::with(['lote', 'usuario'])->get();
        return view('actividades.index', compact('actividades'));
    }

    public function create()
    {
        $lotes = Lote::all();
        $usuarios = Usuario::all();
        return view('actividades.create', compact('lotes', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'descripcion' => 'required|string|max:200',
            'fechainicio' => 'nullable|date',
            'fechafin' => 'nullable|date',
            'tipoactividad' => 'nullable|string|max:50',
            'prioridad' => 'nullable|string|max:20',
        ]);

        Actividad::create($request->all());
        return redirect()->route('actividades.index')->with('success', 'Actividad registrada correctamente.');
    }

    public function show($id)
    {
        $actividad = Actividad::with(['lote', 'usuario'])->findOrFail($id);
        return view('actividades.show', compact('actividad'));
    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        $lotes = Lote::all();
        $usuarios = Usuario::all();
        return view('actividades.edit', compact('actividad', 'lotes', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'descripcion' => 'required|string|max:200',
            'fechainicio' => 'nullable|date',
            'fechafin' => 'nullable|date',
            'tipoactividad' => 'nullable|string|max:50',
            'prioridad' => 'nullable|string|max:20',
        ]);

        $actividad = Actividad::findOrFail($id);
        $actividad->update($request->all());
        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada correctamente.');
    }

    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();
        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada correctamente.');
    }
}