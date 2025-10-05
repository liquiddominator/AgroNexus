<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccion';
    protected $primaryKey = 'produccionid';
    public $timestamps = false;

    protected $fillable = [
        'loteid',
        'cantidadkg',
        'fechacosecha',
        'destino',
        'imagenurl',
        'observaciones',
    ];

    // 🔹 Una producción pertenece a un lote
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }

    // 🔹 Una producción puede estar vinculada a una venta
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'produccionid');
    }
}