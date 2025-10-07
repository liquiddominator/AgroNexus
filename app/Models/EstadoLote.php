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

    // Obtener solo los estados del catálogo (maestros)
    public static function catalogo()
    {
        return self::whereNull('loteid')->get();
    }

    // Obtener solo el historial de estados
    public static function historial($loteid)
    {
        return self::where('loteid', $loteid)->get();
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }
}