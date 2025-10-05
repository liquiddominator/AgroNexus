<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol'; // nombre en minúscula porque Postgres lo convierte así
    protected $primaryKey = 'rolid';
    public $timestamps = false; // tu tabla no tiene created_at ni updated_at

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación: un rol puede pertenecer a muchos usuarios
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuariorol', 'rolid', 'usuarioid');
    }
}