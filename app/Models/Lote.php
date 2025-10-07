<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lote';
    protected $primaryKey = 'loteid';
    
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = 'fechamodificacion';

    protected $fillable = [
        'usuarioid',
        'nombre',
        'ubicacion',
        'superficie',
        'cultivo',
        'fechasiembra',
        'estadoactual',
        'latitud',
        'longitud',
        'imagenurl',
        'activo',
    ];

    protected $casts = [
        'superficie' => 'decimal:2',
        'latitud' => 'decimal:7',
        'longitud' => 'decimal:7',
        'fechasiembra' => 'date',
        'activo' => 'boolean',
        'estadoactual' => 'integer',
        'fechacreacion' => 'datetime',
        'fechamodificacion' => 'datetime'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioid');
    }

    public function estadoActual()
{
    return $this->belongsTo(EstadoLote::class, 'estadoactual', 'estadoid')
                ->whereRaw('CAST(lote.estadoactual AS INTEGER) = estadolote.estadoid');
}

    public function estados()
    {
        return $this->hasMany(EstadoLote::class, 'loteid');
    }

    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'loteid');
    }

    public function insumos()
    {
        return $this->hasMany(LoteInsumo::class, 'loteid');
    }

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'loteid');
    }

    public function climas()
    {
        return $this->hasMany(Clima::class, 'loteid');
    }

public function estadoActualCatalogo()
{
    return $this->belongsTo(CatalogoEstado::class, 'estadoactual', 'catalogo_estado_id');
}

public function historialEstados()
{
    return $this->hasMany(HistorialEstadoLote::class, 'loteid');
}

public function estadoActualHistorial()
{
    return $this->hasOne(HistorialEstadoLote::class, 'loteid')->latest('fecha_cambio');
}

}