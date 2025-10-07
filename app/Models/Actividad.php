<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'actividadid';
    
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = null;

    protected $fillable = [
        'loteid',
        'usuarioid',
        'descripcion',
        'fechainicio',
        'fechafin',
        'tipoactividad',
        'prioridad',
        'estado',
        'observaciones',
    ];

    protected $casts = [
        'fechainicio' => 'datetime',
        'fechafin' => 'datetime',
        'fechacreacion' => 'datetime'
    ];

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioid');
    }
}
