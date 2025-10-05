<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoLote extends Model
{
    protected $table = 'estadolote';
    protected $primaryKey = 'estadoid';
    public $timestamps = false;

    protected $fillable = [
        'loteid',
        'estado',
        'fecharegistro',
        'observaciones',
        'imagenurl',
    ];

    // 🔹 Cada estado pertenece a un lote
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }
}