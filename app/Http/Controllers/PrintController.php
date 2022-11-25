<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print()
    {
        //$idTitulo = 1; $idDiplomado = 1; $idCapacitacion = 1;
        $formaciones = Formacion::all();

        return view('impresion.print', compact('formaciones'));
    }
}
