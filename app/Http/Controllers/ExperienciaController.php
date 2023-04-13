<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienciaFormRequest;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExperienciaController extends Controller
{
    public function index()
    {
        $idExpDocente = 1; $idSuperior = 1; $idConferencista = 1; $idOtro = 1;
        $idDocente = DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $expDocentes = Experiencia::all()->where('tipo', 'docente')->where('idDocente', $idDocente);
        $superiores = Experiencia::all()->where('tipo', 'superior')->where('idDocente', $idDocente);
        $conferencistas = Experiencia::all()->where('tipo', 'conferencista')->where('idDocente', $idDocente);
        $otros = Experiencia::all()->where('tipo', 'otro')->where('idDocente', $idDocente);

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
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

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
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

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
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

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
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

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
