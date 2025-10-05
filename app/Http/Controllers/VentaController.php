<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Produccion;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('produccion')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $producciones = Produccion::all();
        return view('ventas.create', compact('producciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produccionid' => 'required|exists:produccion,produccionid',
            'cliente' => 'nullable|string|max:100',
            'cantidadkg' => 'required|numeric',
            'preciokg' => 'required|numeric',
            'fechaventa' => 'nullable|date',
            'observaciones' => 'nullable|string|max:200',
        ]);

        Venta::create($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }

    public function show($id)
    {
        $venta = Venta::with('produccion')->findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $producciones = Produccion::all();
        return view('ventas.edit', compact('venta', 'producciones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produccionid' => 'required|exists:produccion,produccionid',
            'cliente' => 'nullable|string|max:100',
            'cantidadkg' => 'required|numeric',
            'preciokg' => 'required|numeric',
            'fechaventa' => 'nullable|date',
            'observaciones' => 'nullable|string|max:200',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}