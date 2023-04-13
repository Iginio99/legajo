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

    public function storeGrado1(FormacionFormRequest $request)
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

        return redirect('/formaciones')->with('message', 'Grado agregado');
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

}
