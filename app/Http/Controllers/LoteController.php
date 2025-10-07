<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Usuario;
use App\Models\CatalogoEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    /**
     * Mostrar listado de lotes con filtros y estadísticas
     */
    public function index(Request $request)
    {
        $query = Lote::with(['usuario', 'estadoActualCatalogo']);
        
        // Filtro por nombre del lote
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }
        
        // Filtro por tipo de cultivo
        if ($request->filled('cultivo')) {
            $query->where('cultivo', $request->cultivo);
        }
        
        // Filtro por estado
        if ($request->filled('estado')) {
            $estadoId = CatalogoEstado::where('nombre', $request->estado)->value('catalogo_estado_id');
            if ($estadoId) {
                $query->whereRaw('CAST(estadoactual AS INTEGER) = ?', [$estadoId]);
            }
        }
        
        // Filtro por agricultor
        if ($request->filled('agricultor')) {
            $query->where('usuarioid', $request->agricultor);
        }
        
        // Filtro por rango de fecha de siembra
        if ($request->filled('fecha_desde')) {
            $query->where('fechasiembra', '>=', $request->fecha_desde);
        }
        if ($request->filled('fecha_hasta')) {
            $query->where('fechasiembra', '<=', $request->fecha_hasta);
        }
        
        $lotes = $query->orderBy('fechacreacion', 'desc')->paginate(10);
        
        // Estadísticas para las tarjetas
        $totalLotes = Lote::count();
        $lotesActivos = Lote::where('activo', true)->count();
        
        $listosParaCosecha = DB::table('lote')
            ->join('catalogo_estados', DB::raw('CAST(lote.estadoactual AS INTEGER)'), '=', 'catalogo_estados.catalogo_estado_id')
            ->where('catalogo_estados.nombre', 'Listo para Cosecha')
            ->count();

        $enPreparacion = DB::table('lote')
            ->join('catalogo_estados', DB::raw('CAST(lote.estadoactual AS INTEGER)'), '=', 'catalogo_estados.catalogo_estado_id')
            ->where('catalogo_estados.nombre', 'En Preparación')
            ->count();
        
        // Para los filtros
        $agricultores = Usuario::whereHas('roles', function($q) {
            $q->where('nombre', 'Agricultor');
        })->get();
        
        $cultivos = Lote::select('cultivo')->distinct()->pluck('cultivo');
        
        return view('lotes.index', compact(
            'lotes',
            'totalLotes',
            'lotesActivos',
            'listosParaCosecha',
            'enPreparacion',
            'agricultores',
            'cultivos'
        ));
    }

    public function create()
    {
        $agricultores = Usuario::whereHas('roles', function($q) {
            $q->where('nombre', 'Agricultor');
        })->get();
        
        $estados = CatalogoEstado::activos();
        
        return view('lotes.create', compact('agricultores', 'estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'nullable|string|max:255',
            'superficie' => 'required|numeric|min:0',
            'cultivo' => 'required|string|max:50',
            'fechasiembra' => 'nullable|date',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'imagenurl' => 'nullable|image|max:5120',
            'observaciones' => 'nullable|string',
        ]);

        $data = $request->except('imagenurl');
        
        if ($request->hasFile('imagenurl')) {
            $path = $request->file('imagenurl')->store('lotes', 'public');
            $data['imagenurl'] = '/storage/' . $path;
        }
        
        $data['activo'] = $request->has('activo') ? true : false;

        $lote = Lote::create($data);

        return redirect()->route('lotes.index')->with('success', 'Lote creado correctamente');
    }

    public function show($id)
    {
        $lote = Lote::with(['usuario', 'historialEstados', 'producciones', 'actividades'])->findOrFail($id);
        
        if (request()->ajax()) {
            return view('lotes.partials.detalles', compact('lote'));
        }
        
        return view('lotes.show', compact('lote'));
    }

    public function edit($id)
    {
        $lote = Lote::findOrFail($id);
        
        $agricultores = Usuario::whereHas('roles', function($q) {
            $q->where('nombre', 'Agricultor');
        })->get();
        
        $estados = CatalogoEstado::activos();
        
        return view('lotes.edit', compact('lote', 'agricultores', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $lote = Lote::findOrFail($id);

        $request->validate([
            'usuarioid' => 'required|exists:usuario,usuarioid',
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'nullable|string|max:255',
            'superficie' => 'required|numeric|min:0',
            'cultivo' => 'required|string|max:50',
            'fechasiembra' => 'nullable|date',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'imagenurl' => 'nullable|image|max:5120',
            'observaciones' => 'nullable|string',
        ]);

        $data = $request->except('imagenurl');
        
        if ($request->hasFile('imagenurl')) {
            $path = $request->file('imagenurl')->store('lotes', 'public');
            $data['imagenurl'] = '/storage/' . $path;
        }
        
        $data['activo'] = $request->has('activo') ? true : false;

        $lote->update($data);

        return redirect()->route('lotes.index')->with('success', 'Lote actualizado correctamente');
    }

    public function destroy($id)
    {
        $lote = Lote::findOrFail($id);
        $lote->delete();

        return redirect()->route('lotes.index')->with('success', 'Lote eliminado correctamente');
    }
}