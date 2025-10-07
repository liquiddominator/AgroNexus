<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoEstado extends Model
{
    protected $table = 'catalogo_estados';
    protected $primaryKey = 'catalogo_estado_id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'color',
        'icono',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    // Solo estados activos
    public static function activos()
    {
        return self::where('activo', true)->get();
    }
}