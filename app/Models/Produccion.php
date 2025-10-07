<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccion';
    protected $primaryKey = 'produccionid';
    
    const CREATED_AT = 'fechacreacion';
    const UPDATED_AT = null;

    protected $fillable = [
        'loteid',
        'cantidadkg',
        'fechacosecha',
        'destino',
        'imagenurl',
        'observaciones',
    ];

    protected $casts = [
        'cantidadkg' => 'decimal:2',
        'fechacosecha' => 'date',
        'fechacreacion' => 'datetime'
    ];

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'produccionid');
    }
}