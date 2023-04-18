<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use App\Models\Formacion;
use App\Models\Merito;
use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrintController extends Controller
{
    public function print()
    {
        //$idTitulo = 1; $idDiplomado = 1; $idCapacitacion = 1;
        $formaciones = Formacion::all();

        return view('impresion.print', compact('formaciones'));
    }



    public function index()
    {
        $idTitulo = 1; $idDiplomado = 1; $idCapacitacion = 1;
        $idDocente = DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $titulos = Formacion::all()->where('formacion', 'titulo')->where('idDocente', $idDocente);
        $grados = Formacion::all()->where('formacion', 'grado')->where('idDocente', $idDocente);
        $diplomados = Formacion::all()->where('formacion', 'diplomado')->where('idDocente', $idDocente);
        $capacitaciones = Formacion::all()->where('formacion', 'capacitacion')->where('idDocente', $idDocente);

        $idExpDocente = 1; $idSuperior = 1; $idConferencista = 1; $idOtro = 1;
        $expDocentes = Experiencia::all()->where('tipo', 'docente')->where('idDocente', $idDocente);
        $superiores = Experiencia::all()->where('tipo', 'superior')->where('idDocente', $idDocente);
        $conferencistas = Experiencia::all()->where('tipo', 'conferencista')->where('idDocente', $idDocente);
        $otros = Experiencia::all()->where('tipo', 'otro')->where('idDocente', $idDocente);

        $idInvestigacion = 1; $idPublicacion = 1; $idExposicion = 1;
        $investigaciones = Produccion::all()->where('tipo', 'investigacion')->where('idDocente', $idDocente);
        $exposiciones = Produccion::all()->where('tipo', 'exposicion')->where('idDocente', $idDocente);

        $idMerito = 1;
        $meritos = Merito::all()->where('idDocente', $idDocente);


        return view('impresion.index', compact(
            'titulos',
            'grados',
            'diplomados',
            'capacitaciones',
            'idTitulo',
            'idDiplomado',
            'idCapacitacion',

            'expDocentes',
            'superiores',
            'conferencistas',
            'otros',
            'idExpDocente',
            'idSuperior',
            'idConferencista',
            'idOtro',

            'investigaciones',
            'exposiciones',
            'idInvestigacion',
            'idPublicacion',
            'idExposicion',

            'meritos',
            'idMerito'
        ));
    }
}
