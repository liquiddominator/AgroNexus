<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Lote::with('usuario')->get();
        return view('lotes.index', compact('lotes'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('lotes.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'nombre' => 'required|string|max:100',
            'superficie' => 'required|numeric',
            'cultivo' => 'required|string|max:50',
        ]);

        Lote::create($request->all());
        return redirect()->route('lotes.index')->with('success', 'Lote creado correctamente.');
    }

    public function show($id)
    {
        $lote = Lote::with(['usuario', 'estados', 'producciones'])->findOrFail($id);
        return view('lotes.show', compact('lote'));
    }

    public function edit($id)
    {
        $lote = Lote::findOrFail($id);
        $usuarios = Usuario::all();
        return view('lotes.edit', compact('lote', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'nombre' => 'required|string|max:100',
            'superficie' => 'required|numeric',
            'cultivo' => 'required|string|max:50',
        ]);

        $lote = Lote::findOrFail($id);
        $lote->update($request->all());
        return redirect()->route('lotes.index')->with('success', 'Lote actualizado correctamente.');
    }

    public function destroy($id)
    {
        $lote = Lote::findOrFail($id);
        $lote->delete();
        return redirect()->route('lotes.index')->with('success', 'Lote eliminado correctamente.');
    }
}