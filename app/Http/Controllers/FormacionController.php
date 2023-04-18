<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormacionFormRequest;
use App\Models\Docente;
use App\Models\Formacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormacionController extends Controller
{
    public function index()
    {
        $idTitulo = 1; $idDiplomado = 1; $idCapacitacion = 1;
        $idDocente = DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $titulos = Formacion::all()->where('formacion', 'titulo')->where('idDocente', $idDocente);
        $grados = Formacion::all()->where('formacion', 'grado')->where('idDocente', $idDocente);
        $diplomados = Formacion::all()->where('formacion', 'diplomado')->where('idDocente', $idDocente);
        $capacitaciones = Formacion::all()->where('formacion', 'capacitacion')->where('idDocente', $idDocente);

        return view('formacion.index', compact(
            'titulos',
            'grados',
            'diplomados',
            'capacitaciones',
            'idTitulo',
            'idDiplomado',
            'idCapacitacion'
        ));
    }

    public function storeTitulo(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'titulo';
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Titulo agregado');
    }

    public function destroyTitulo($denominacion_titulo, $institucion_titulo, $year_titulo){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idTitulo = DB::table('formaciones')->where('denominacion', $denominacion_titulo)->where('institucion', $institucion_titulo)
            ->where('year', $year_titulo)->where('idDocente', $idDocente)->value('id');
        $titulo = Formacion::find($idTitulo)->delete();
        return redirect('/formaciones')->with('message', 'Titulo eliminado');
    }

    public function storeGrado(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'grado';
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Titulo agregado');
    }

    public function destroyGrado($denominacion_grado, $institucion_grado, $year_grado, $otro_grado){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idGrado = DB::table('formaciones')->where('denominacion', $denominacion_grado)->where('institucion', $institucion_grado)
            ->where('year', $year_grado)->where('idDocente', $idDocente)->where('otro', $otro_grado)->value('id');
        $grado = Formacion::find($idGrado)->delete();
        return redirect('/formaciones')->with('message', 'Grado eliminado');
    }

    public function storeDiplomado(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'diplomado';
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Diplomado agregado');
    }

    public function destroyDiplomado($denominacion_diplomado, $institucion_diplomado, $year_diplomado){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idDiplomado = DB::table('formaciones')->where('denominacion', $denominacion_diplomado)->where('institucion', $institucion_diplomado)
            ->where('year', $year_diplomado)->where('idDocente', $idDocente)->value('id');
        $diplomado = Formacion::find($idDiplomado)->delete();
        return redirect('/formaciones')->with('message', 'Titulo eliminado');
    }

    public function storeCapacitacion(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'capacitacion';
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;
        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Capacitacion agregado');
    }

    public function destroyCapacitacion($denominacion_capacitacion, $institucion_capacitacion, $year_capacitacion, $otro_capacitacion){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idCapacitacion = DB::table('formaciones')->where('denominacion', $denominacion_capacitacion)->where('institucion', $institucion_capacitacion)
            ->where('year', $year_capacitacion)->where('idDocente', $idDocente)->where('otro', $otro_capacitacion)->value('id');
        $capacitacion = Formacion::find($idCapacitacion)->delete();
        return redirect('/formaciones')->with('message', 'Grado eliminado');
    }

}
