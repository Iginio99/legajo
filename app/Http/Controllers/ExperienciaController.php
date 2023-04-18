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

    public function destroyExpDocente($institucion_expDocente, $year_expDocente){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idExpDocente = DB::table('experiencias')->where('institucion', $institucion_expDocente)
            ->where('year', $year_expDocente)->where('idDocente', $idDocente)->value('id');
        $expDocente = Experiencia::find($idExpDocente)->delete();
        return redirect('/experiencias')->with('message', 'Experiencia Docente eliminado');
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

    public function destroySuperior($institucion_superior, $year_superior){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idSuperior = DB::table('experiencias')->where('institucion', $institucion_superior)
            ->where('year', $year_superior)->where('idDocente', $idDocente)->value('id');
        $superior = Experiencia::find($idSuperior)->delete();
        return redirect('/experiencias')->with('message', 'Experiencia Docente eliminado');
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

    public function destroyConferencista($institucion_conferencista, $year_conferencista){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idConferencista = DB::table('experiencias')->where('institucion', $institucion_conferencista)
            ->where('year', $year_conferencista)->where('idDocente', $idDocente)->value('id');
        $conferencista = Experiencia::find($idConferencista)->delete();
        return redirect('/experiencias')->with('message', 'Experiencia Docente eliminado');
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

    public function destroyOtro($institucion_otro, $year_otro, $otro_otro){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idOtro = DB::table('experiencias')->where('institucion', $institucion_otro)
            ->where('year', $year_otro)->where('otro', $otro_otro)->where('idDocente', $idDocente)->value('id');
        $otro = Experiencia::find($idOtro)->delete();
        return redirect('/experiencias')->with('message', 'Experiencia Docente eliminado');
    }
}
