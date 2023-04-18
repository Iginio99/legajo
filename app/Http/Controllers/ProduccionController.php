<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduccionFormRequest;
use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduccionController extends Controller
{
    public function index()
    {
        $idInvestigacion = 1; $idPublicacion = 1; $idExposicion = 1;
        $idDocente = DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $investigaciones = Produccion::all()->where('tipo', 'investigacion')->where('idDocente', $idDocente);
        $exposiciones = Produccion::all()->where('tipo', 'exposicion')->where('idDocente', $idDocente);

        return view('produccion.index', compact(
            'investigaciones',
            'exposiciones',
            'idInvestigacion',
            'idPublicacion',
            'idExposicion'
        ));
    }

    public function storeInvestigacion(ProduccionFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'investigacion';
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $produccion = Produccion::create($data);

        return redirect('/producciones')->with('message', 'Investigacion agregada');
    }

    public function destroyInvestigacion($institucion_investigacion, $year_investigacion){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idInvestigacion = DB::table('producciones')->where('institucion', $institucion_investigacion)
            ->where('year', $year_investigacion)->where('idDocente', $idDocente)->value('id');
        $investigacion = Produccion::find($idInvestigacion)->delete();
        return redirect('/producciones')->with('message', 'Investigacion eliminado');
    }

    public function storeExposicion(ProduccionFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'exposicion';
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $produccion = Produccion::create($data);

        return redirect('/producciones')->with('message', 'Exposicion agregada');
    }
    
    public function destroyExposicion($institucion_exposicion, $year_exposicion){
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $idExposicion = DB::table('producciones')->where('institucion', $institucion_exposicion)
            ->where('year', $year_exposicion)->where('idDocente', $idDocente)->value('id');
        $exposicion = Produccion::find($idExposicion)->delete();
        return redirect('/producciones')->with('message', 'Exposicion eliminada');
    }

}
