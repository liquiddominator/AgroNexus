<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'ventaid';
    public $timestamps = false;

    protected $fillable = [
        'produccionid',
        'cliente',
        'cantidadkg',
        'preciokg',
        'fechaventa',
        'total',
        'observaciones',
    ];

    // 🔹 Cada venta pertenece a una producción
    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'produccionid');
    }
}