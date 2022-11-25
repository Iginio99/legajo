<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merito extends Model
{
    use HasFactory;
    protected $table = 'meritos';
    protected $fillable = [
        'denominacion',
        'institucion',
        'year',
        'documento',
        'idDocente'
    ];
}
