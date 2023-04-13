<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduccionFormRequest;
use App\Models\Produccion;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function index()
    {
        $idInvestigacion = 1; $idPublicacion = 1; $idExposicion = 1;
        $investigaciones = Produccion::all()->where('tipo', 'investigacion');
        $exposiciones = Produccion::all()->where('tipo', 'exposicion');

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
        $data['idDocente'] = 1;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $produccion = Produccion::create($data);

        return redirect('/producciones')->with('message', 'Titulo agregado');
    }

    public function storeExposicion(ProduccionFormRequest $request)
    {
        $data = $request->validated();
        $data['tipo'] = 'exposicion';
        $data['idDocente'] = 1;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $produccion = Produccion::create($data);

        return redirect('/producciones')->with('message', 'Diplomado agregado');
    }

}
