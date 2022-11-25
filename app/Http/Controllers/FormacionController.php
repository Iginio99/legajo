<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormacionFormRequest;
use App\Models\Docente;
use App\Models\Formacion;

class FormacionController extends Controller
{
    public function index()
    {
        $idTitulo = 1; $idDiplomado = 1; $idCapacitacion = 1;
        $titulos = Formacion::all()->where('formacion', 'titulo');
        $grados = Formacion::all()->where('formacion', 'grado');
        $diplomados = Formacion::all()->where('formacion', 'diplomado');
        $capacitaciones = Formacion::all()->where('formacion', 'capacitacion');

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
        $data['idDocente'] = 1;

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

    public function storeGrado(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'grado';
        $data['idDocente'] = 1;
        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Titulo agregado');
    }

    public function storeDiplomado(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'diplomado';
        $data['idDocente'] = 1;
        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Diplomado agregado');
    }

    public function storeCapacitacion(FormacionFormRequest $request)
    {
        $data = $request->validated();
        $data['formacion'] = 'capacitacion';
        $data['idDocente'] = 1;
        $formacion = Formacion::create($data);

        return redirect('/formaciones')->with('message', 'Capacitacion agregado');
    }

}
