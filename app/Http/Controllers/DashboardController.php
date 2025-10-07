<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Insumo;
use App\Models\Produccion;
use App\Models\Venta;
use App\Models\Actividad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas principales
        $totalLotes = Lote::where('activo', true)->count();
        $produccionMes = Produccion::whereMonth('fechacosecha', now()->month)
                                   ->sum('cantidadkg');
        $alertasInventario = Insumo::whereColumn('stock', '<=', 'stockminimo')
                                   ->where('activo', true)
                                   ->count();
        $ventasMes = Venta::whereMonth('fechaventa', now()->month)
                          ->sum('total');

        // Producción últimos 6 meses por cultivo
        $produccionMeses = Produccion::select(
            DB::raw("TO_CHAR(fechacosecha, 'TMMonth') as mes"),
            DB::raw("EXTRACT(MONTH FROM fechacosecha) as mes_num"),
            'l.cultivo',
            DB::raw('SUM(cantidadkg) as total')
        )
        ->join('lote as l', 'produccion.loteid', '=', 'l.loteid')
        ->where('fechacosecha', '>=', now()->subMonths(6))
        ->groupBy(DB::raw("TO_CHAR(fechacosecha, 'TMMonth')"), DB::raw("EXTRACT(MONTH FROM fechacosecha)"), 'l.cultivo')
        ->orderBy('mes_num')
        ->get();

        // Actividades recientes
        $actividadesRecientes = Actividad::with(['lote', 'usuario'])
                                        ->orderBy('fechacreacion', 'desc')
                                        ->limit(5)
                                        ->get();

        // Insumos con stock bajo
        $insumosbajos = Insumo::whereColumn('stock', '<=', 'stockminimo')
                             ->where('activo', true)
                             ->limit(5)
                             ->get();

        // Estado de lotes
        $lotesEnCrecimiento = Lote::where('estadoactual', 'En Crecimiento')->where('activo', true)->count();
        $lotesListosCosecha = Lote::where('estadoactual', 'Listo para Cosecha')->where('activo', true)->count();
        $lotesEnPreparacion = Lote::where('estadoactual', 'En Preparación')->where('activo', true)->count();
        $lotesEnDescanso = Lote::where('estadoactual', 'En Descanso')->where('activo', true)->count();

        // Top cultivos por producción
        $topCultivos = Produccion::select('l.cultivo', DB::raw('SUM(cantidadkg) as total'))
                                 ->join('lote as l', 'produccion.loteid', '=', 'l.loteid')
                                 ->groupBy('l.cultivo')
                                 ->orderBy('total', 'desc')
                                 ->limit(4)
                                 ->get();

        // Obtener clima real de Santa Cruz
        try {
            $apiKey = env('OPENWEATHER_API_KEY');
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => 'Santa Cruz de la Sierra,BO',
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'es'
            ]);

            if ($response->successful()) {
                $clima = $response->json();
                $climaData = [
                    'temperatura' => round($clima['main']['temp']),
                    'descripcion' => ucfirst($clima['weather'][0]['description']),
                    'humedad' => $clima['main']['humidity'],
                    'viento' => round($clima['wind']['speed'] * 3.6)
                ];
            } else {
                throw new \Exception('API Error');
            }
        } catch (\Exception $e) {
            // Valores por defecto si falla la API
            $climaData = [
                'temperatura' => 26,
                'descripcion' => 'Datos no disponibles',
                'humedad' => 65,
                'viento' => 14
            ];
        }

        return view('dashboard', compact(
            'totalLotes',
            'produccionMes',
            'alertasInventario',
            'ventasMes',
            'produccionMeses',
            'actividadesRecientes',
            'insumosbajos',
            'lotesEnCrecimiento',
            'lotesListosCosecha',
            'lotesEnPreparacion',
            'lotesEnDescanso',
            'topCultivos',
            'climaData'
        ));
    }
}