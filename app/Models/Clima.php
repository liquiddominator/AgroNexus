<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clima extends Model
{
    protected $table = 'clima';
    protected $primaryKey = 'climaid';
    public $timestamps = false;

    protected $fillable = [
        'loteid',
        'fecha',
        'temperatura',
        'humedad',
        'lluvia',
        'observaciones',
    ];

    // 🔹 Cada registro climático pertenece a un lote
    public function lote()
    {
        return $this->belongsTo(Lote::class, 'loteid');
    }
}