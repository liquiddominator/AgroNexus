<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'actividadid';
    public $timestamps = false;

    protected $fillable = [
        'loteid',
        'usuarioid',
        'descripcion',
        'fechainicio',
        'fechafin',
        'tipoactividad',
        'prioridad',
        'observaciones',
    ];

    // 🔹 Una actividad pertenece a un lote
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }

    // 🔹 Una actividad pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioid');
    }
}