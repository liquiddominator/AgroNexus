<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'ventaid';
    
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = null;

    protected $fillable = [
        'produccionid',
        'cliente',
        'cantidadkg',
        'preciokg',
        'fechaventa',
        'observaciones',
    ];

    protected $casts = [
        'cantidadkg' => 'decimal:2',
        'preciokg' => 'decimal:2',
        'total' => 'decimal:2',
        'fechaventa' => 'date',
        'fechacreacion' => 'datetime'
    ];

    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'produccionid');
    }
}