<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeritoFormRequest;
use App\Models\Merito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MeritoController extends Controller
{
    public function index()
    {
        $idMerito = 1;
        $idDocente = DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $meritos = Merito::all()->where('idDocente', $idDocente);

        return view('merito.index', compact('meritos', 'idMerito'));
    }

    public function store(MeritoFormRequest $request)
    {
        $data = $request->validated();
        $idDocente =  DB::table('docentes')->where('idUsuario', Auth::user()->id)->value('id');
        $data['idDocente'] = $idDocente;

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $data['documento'] = $destinationPath . $filename;
        }

        $merito = Merito::create($data);

        return redirect('/meritos')->with('message', 'Merito agregado');
    }
}
