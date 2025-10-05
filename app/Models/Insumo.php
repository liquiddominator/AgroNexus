<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $primaryKey = 'insumoid';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'tipo',
        'unidad',
        'stock',
        'stockminimo',
        'proveedor',
        'preciounitario',
        'descripcion',
    ];

    // 🔹 Un insumo puede usarse en muchos lotes (relación con pivote LoteInsumo)
    public function lotes()
    {
        return $this->hasMany(LoteInsumo::class, 'insumoid');
    }
}