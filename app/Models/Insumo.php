<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';
    protected $primaryKey = 'insumoid';
    
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = 'fechamodificacion';

    protected $fillable = [
        'nombre',
        'tipo',
        'unidad',
        'stock',
        'stockminimo',
        'proveedor',
        'preciounitario',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'stock' => 'decimal:2',
        'stockminimo' => 'decimal:2',
        'preciounitario' => 'decimal:2',
        'activo' => 'boolean',
        'fechacreacion' => 'datetime',
        'fechamodificacion' => 'datetime'
    ];

    public function lotes()
    {
        return $this->hasMany(LoteInsumo::class, 'insumoid');
    }

    public function necesitaReposicion()
    {
        return $this->stock <= $this->stockminimo;
    }
}