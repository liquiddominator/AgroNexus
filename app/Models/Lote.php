<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lote';
    protected $primaryKey = 'loteid';
    public $timestamps = false;

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
        'fechacreacion',
        'fechamodificacion',
        'imagenurl',
    ];

    // 🔹 Un lote pertenece a un usuario (agricultor)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioid');
    }

    // 🔹 Un lote tiene muchos estados
    public function estados()
    {
        return $this->hasMany(EstadoLote::class, 'loteid');
    }

    // 🔹 Un lote puede tener muchas producciones
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'loteid');
    }

    // 🔹 Un lote puede tener muchos insumos usados
    public function insumos()
    {
        return $this->hasMany(LoteInsumo::class, 'loteid');
    }

    // 🔹 Un lote puede tener muchas actividades
    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'loteid');
    }

    // 🔹 Un lote puede tener registros climáticos
    public function climas()
    {
        return $this->hasMany(Clima::class, 'loteid');
    }
}