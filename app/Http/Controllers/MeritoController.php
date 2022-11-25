<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeritoFormRequest;
use App\Models\Merito;
use Illuminate\Http\Request;

class MeritoController extends Controller
{
    public function index()
    {
        $idMerito = 1;
        $meritos = Merito::all()->where('idDocente', '1');

        return view('merito.index', compact('meritos', 'idMerito'));
    }

    public function store(MeritoFormRequest $request)
    {
        $data = $request->validated();
        $data['idDocente'] = 1;

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
