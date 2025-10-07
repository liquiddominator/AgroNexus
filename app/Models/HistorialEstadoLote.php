<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialEstadoLote extends Model
{
    protected $table = 'historial_estados_lote';
    protected $primaryKey = 'historial_estado_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'loteid',
        'catalogo_estado_id',
        'fecha_cambio',
        'observaciones',
        'imagenurl',
        'usuarioid',
    ];

    protected $casts = [
        'fecha_cambio' => 'datetime',
    ];

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }

    public function estado()
    {
        return $this->belongsTo(CatalogoEstado::class, 'catalogo_estado_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioid');
    }
}