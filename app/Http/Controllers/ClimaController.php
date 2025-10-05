<?php

namespace App\Http\Controllers;

use App\Models\Clima;
use App\Models\Lote;
use Illuminate\Http\Request;

class ClimaController extends Controller
{
    public function index()
    {
        $climas = Clima::with('lote')->get();
        return view('climas.index', compact('climas'));
    }

    public function create()
    {
        $lotes = Lote::all();
        return view('climas.create', compact('lotes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'fecha' => 'nullable|date',
            'temperatura' => 'nullable|numeric',
            'humedad' => 'nullable|numeric',
            'lluvia' => 'nullable|numeric',
            'observaciones' => 'nullable|string|max:200',
        ]);

        Clima::create($request->all());
        return redirect()->route('climas.index')->with('success', 'Registro climático creado correctamente.');
    }

    public function show($id)
    {
        $clima = Clima::with('lote')->findOrFail($id);
        return view('climas.show', compact('clima'));
    }

    public function edit($id)
    {
        $clima = Clima::findOrFail($id);
        $lotes = Lote::all();
        return view('climas.edit', compact('clima', 'lotes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'loteid' => 'required|exists:lote,loteid',
            'fecha' => 'nullable|date',
            'temperatura' => 'nullable|numeric',
            'humedad' => 'nullable|numeric',
            'lluvia' => 'nullable|numeric',
            'observaciones' => 'nullable|string|max:200',
        ]);

        $clima = Clima::findOrFail($id);
        $clima->update($request->all());
        return redirect()->route('climas.index')->with('success', 'Registro climático actualizado correctamente.');
    }

    public function destroy($id)
    {
        $clima = Clima::findOrFail($id);
        $clima->delete();
        return redirect()->route('climas.index')->with('success', 'Registro climático eliminado correctamente.');
    }
}