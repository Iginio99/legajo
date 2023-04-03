<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'lugar_nacimiento',
        'fecha_nacimiento',
        'domicilio_actual',
        'telefono',
        'celular',
        'sistema_pension',
        'cuspp',
        'correo',
        'idioma',
        'foto',
        'idUsuario'
    ];
}
