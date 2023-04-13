<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienciaFormRequest;
use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function index()
    {
        $idExpDocente = 1; $idSuperior = 1; $idConferencista = 1; $idOtro = 1;
        $expDocentes = Experiencia::all()->where('tipo', 'docente');
        $superiores = Experiencia::all()->where('tipo', 'superior');
        $conferencistas = Experiencia::all()->where('tipo', 'conferencista');
        $otros = Experiencia::all()->where('tipo', 'otro');

        return view('experiencia.index', compact(
            'expDocentes',
            'superiores',
            'conferencistas',
            'otros',
            'idExpDocente',
            'idSuperior',
            'idConferencista',
            'idOtro'
        ));
    }

    public function storeDocente(ExperienciaFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'docente';
        $data['idDocente'] = 1;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $experiencia = Experiencia::create($data);

        return redirect('/experiencias')->with('message', 'Experiencia docente agregado');
    }

    public function storeSuperior(ExperienciaFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'superior';
        $data['idDocente'] = 1;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $experiencia = Experiencia::create($data);

        return redirect('/experiencias')->with('message', 'Experiencia superior agregado');
    }

    public function storeConferencista(ExperienciaFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'conferencista';
        $data['idDocente'] = 1;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $experiencia = Experiencia::create($data);

        return redirect('/experiencias')->with('message', 'Conferencista agregado');
    }

    public function storeOtro(ExperienciaFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'otro';
        $data['idDocente'] = 1;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $experiencia = Experiencia::create($data);

        return redirect('/experiencias')->with('message', 'Otros agregado');
    }
}
