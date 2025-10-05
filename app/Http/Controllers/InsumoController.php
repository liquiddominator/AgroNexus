<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::all();
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'nullable|string|max:50',
            'unidad' => 'nullable|string|max:20',
            'stock' => 'nullable|numeric',
            'stockminimo' => 'nullable|numeric',
            'proveedor' => 'nullable|string|max:100',
            'preciounitario' => 'nullable|numeric',
            'descripcion' => 'nullable|string',
        ]);

        Insumo::create($request->all());
        return redirect()->route('insumos.index')->with('success', 'Insumo creado correctamente.');
    }

    public function show($id)
    {
        $insumo = Insumo::with('lotes')->findOrFail($id);
        return view('insumos.show', compact('insumo'));
    }

    public function edit($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'nullable|string|max:50',
            'unidad' => 'nullable|string|max:20',
            'stock' => 'nullable|numeric',
            'stockminimo' => 'nullable|numeric',
            'proveedor' => 'nullable|string|max:100',
            'preciounitario' => 'nullable|numeric',
            'descripcion' => 'nullable|string',
        ]);

        $insumo = Insumo::findOrFail($id);
        $insumo->update($request->all());
        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();
        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado correctamente.');
    }
}