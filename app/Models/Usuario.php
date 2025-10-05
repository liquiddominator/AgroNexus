<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'usuarioid';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'nombreusuario',
        'telefono',
        'passwordhash',
        'imagenurl',
        'informacionadicional',
        'fecharegistro',
        'fechamodificacion',
        'ultimologin',
        'activo',
    ];

    // Relación: un usuario puede tener muchos roles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuariorol', 'usuarioid', 'rolid');
    }
}