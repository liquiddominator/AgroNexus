<?php

namespace App\Http\Controllers;

use App\Models\LoteInsumo;
use App\Models\Lote;
use App\Models\Insumo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoteInsumoController extends Controller
{
    public function index()
    {
        $loteinsumos = LoteInsumo::with(['lote', 'insumo', 'usuario'])->get();
        return view('loteinsumos.index', compact('loteinsumos'));
    }

    public function create()
    {
        $lotes = Lote::all();
        $insumos = Insumo::all();
        $usuarios = Usuario::all();
        return view('loteinsumos.create', compact('lotes', 'insumos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'insumoid' => 'required|exists:insumo,insumoid',
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'cantidadusada' => 'required|numeric',
            'costototal' => 'nullable|numeric',
            'estado' => 'nullable|string|max:50',
        ]);

        LoteInsumo::create($request->all());
        return redirect()->route('loteinsumos.index')->with('success', 'Registro de insumo en lote creado correctamente.');
    }

    public function show($id)
    {
        $loteinsumo = LoteInsumo::with(['lote', 'insumo', 'usuario'])->findOrFail($id);
        return view('loteinsumos.show', compact('loteinsumo'));
    }

    public function edit($id)
    {
        $loteinsumo = LoteInsumo::findOrFail($id);
        $lotes = Lote::all();
        $insumos = Insumo::all();
        $usuarios = Usuario::all();
        return view('loteinsumos.edit', compact('loteinsumo', 'lotes', 'insumos', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'insumoid' => 'required|exists:insumo,insumoid',
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'cantidadusada' => 'required|numeric',
            'costototal' => 'nullable|numeric',
            'estado' => 'nullable|string|max:50',
        ]);

        $loteinsumo = LoteInsumo::findOrFail($id);
        $loteinsumo->update($request->all());
        return redirect()->route('loteinsumos.index')->with('success', 'Registro de insumo en lote actualizado correctamente.');
    }

    public function destroy($id)
    {
        $loteinsumo = LoteInsumo::findOrFail($id);
        $loteinsumo->delete();
        return redirect()->route('loteinsumos.index')->with('success', 'Registro de insumo en lote eliminado correctamente.');
    }
}