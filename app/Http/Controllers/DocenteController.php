<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocenteFormRequest;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{

    public function index(){
        $docentes = Docente::all();
        return view('docente.index', compact('docentes'));
    }

    public function create(){
        return view('docente.create');
    }

    public function store(DocenteFormRequest $request){
        $data = $request->validated();
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'images/fotos/';
            $filename = time() . ' ' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $data['foto'] = $destinationPath . $filename;
        }

        $docente = Docente::create($data);
        return redirect('/add-docente')->with('message','Docente agregado');
    }

    public function edit($docente_id){
        $docente = Docente::find($docente_id);

        return view('docente.edit', compact('docente'));
    }

    public function update(DocenteFormRequest $request, $docente_id){

        $data = $request->validated();

        $docente = Docente::where('id', $docente_id)->update([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'lugar_nacimiento' => $data['lugar_nacimiento'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'domicilio_actual' => $data['domicilio_actual'],
            'telefono' => $data['telefono'],
            'celular' => $data['celular'],
            'sistema_pension' => $data['sistema_pension'],
            'cuspp' => $data['cuspp'],
            'correo' => $data['correo'],
            'idioma' => $data['idioma']
        ]);

        return redirect('/docentes')->with('message','Datos actualizados');
        //return redirect('/add-docente')->with('message','Docente agregado');
    }

    public function destroy($docente_id){
        $docente = Docente::find($docente_id)->delete();
        return redirect('/docentes')->with('message', 'Docente eliminado');
    }
}
