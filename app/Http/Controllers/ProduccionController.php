<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use App\Models\Lote;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function index()
    {
        $producciones = Produccion::with('lote')->get();
        return view('producciones.index', compact('producciones'));
    }

    public function create()
    {
        $lotes = Lote::all();
        return view('producciones.create', compact('lotes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'cantidadkg' => 'required|numeric',
            'fechacosecha' => 'nullable|date',
            'destino' => 'nullable|string|max:100',
        ]);

        Produccion::create($request->all());
        return redirect()->route('producciones.index')->with('success', 'Producción registrada correctamente.');
    }

    public function show($id)
    {
        $produccion = Produccion::with(['lote', 'ventas'])->findOrFail($id);
        return view('producciones.show', compact('produccion'));
    }

    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        $lotes = Lote::all();
        return view('producciones.edit', compact('produccion', 'lotes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'cantidadkg' => 'required|numeric',
            'fechacosecha' => 'nullable|date',
            'destino' => 'nullable|string|max:100',
        ]);

        $produccion = Produccion::findOrFail($id);
        $produccion->update($request->all());
        return redirect()->route('producciones.index')->with('success', 'Producción actualizada correctamente.');
    }

    public function destroy($id)
    {
        $produccion = Produccion::findOrFail($id);
        $produccion->delete();
        return redirect()->route('producciones.index')->with('success', 'Producción eliminada correctamente.');
    }
}