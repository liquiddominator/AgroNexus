<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoteInsumo extends Model
{
    protected $table = 'loteinsumo';
    protected $primaryKey = 'loteinsumoid';
    public $timestamps = false;

    protected $fillable = [
        'loteid',
        'insumoid',
        'usuarioid',
        'cantidadusada',
        'fechauso',
        'costototal',
        'estado',
        'observaciones',
    ];

    // 🔹 Relación con Lote
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }

    // 🔹 Relación con Insumo
    public function insumo()
    {
        return $this->belongsTo(Insumo::class, 'insumoid');
    }

    // 🔹 Relación con Usuario (quién aplicó el insumo)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarioid');
    }
}