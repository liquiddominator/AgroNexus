<?php

namespace App\Http\Controllers;

use App\Models\EstadoLote;
use App\Models\Lote;
use Illuminate\Http\Request;

class EstadoLoteController extends Controller
{
    public function index()
    {
        $estados = EstadoLote::with('lote')->get();
        return view('estadolotes.index', compact('estados'));
    }

    public function create()
    {
        $lotes = Lote::all();
        return view('estadolotes.create', compact('lotes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'estado' => 'required|string|max:50',
        ]);

        EstadoLote::create($request->all());
        return redirect()->route('estadolotes.index')->with('success', 'Estado del lote registrado correctamente.');
    }

    public function show($id)
    {
        $estado = EstadoLote::with('lote')->findOrFail($id);
        return view('estadolotes.show', compact('estado'));
    }

    public function edit($id)
    {
        $estado = EstadoLote::findOrFail($id);
        $lotes = Lote::all();
        return view('estadolotes.edit', compact('estado', 'lotes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'estado' => 'required|string|max:50',
        ]);

        $estado = EstadoLote::findOrFail($id);
        $estado->update($request->all());
        return redirect()->route('estadolotes.index')->with('success', 'Estado del lote actualizado correctamente.');
    }

    public function destroy($id)
    {
        $estado = EstadoLote::findOrFail($id);
        $estado->delete();
        return redirect()->route('estadolotes.index')->with('success', 'Estado del lote eliminado correctamente.');
    }
}