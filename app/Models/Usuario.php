<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Usuario extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'usuario';
    protected $primaryKey = 'usuarioid';
    
    const CREATED_AT = 'fecharegistro';
    const UPDATED_AT = 'fechamodificacion';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'nombreusuario',
        'telefono',
        'passwordhash',
        'imagenurl',
        'informacionadicional',
        'activo',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'fecharegistro' => 'datetime',
        'fechamodificacion' => 'datetime',
        'ultimologin' => 'datetime'
    ];

    protected $hidden = [
        'passwordhash'
    ];

    public function getAuthPassword()
    {
        return $this->passwordhash;
    }

    public function getAuthIdentifierName()
    {
        return 'usuarioid';
    }

    public function getAuthIdentifier()
    {
        return $this->usuarioid;
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuariorol', 'usuarioid', 'rolid');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'usuarioid');
    }

    public function tieneRol($nombreRol)
    {
        return $this->roles()->where('nombre', $nombreRol)->exists();
    }
}