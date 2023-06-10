<?php

namespace App\Http\Controllers;

use App\Models\Propuesta;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AlumnosController extends Controller
{
    
    public function index()
    {
        
        $estudiantes    = Estudiante::orderBy('nombre')->get();
        return view('alumnos.index',compact('estudiantes'));
    }
    public function alumnoIngresar(Request $request)
    {
        // $alumno = $estudiante->where('rut', $request->alumno)->get();
        $rut = $request->alumno;
        return redirect()->route('alumnos.ingresado',$rut);
    }
    public function alumnoIngresado(Estudiante $alumno)
    {
        $estudiantes    = Estudiante::orderBy('nombre')->get();
        $propuestas     = Propuesta::where('estudiante_rut',$alumno->rut)->orderByDesc('fecha')->first();
        return view('alumnos.alumno',compact(['alumno','estudiantes','propuestas']));
    }
    
    public function agregar(Estudiante $alumno)
    {
        return view('alumnos.agregar',compact('alumno'));
    }
    public function store(Request $request, Estudiante $alumno)
    {
        
        $pdf= $request->file('pdf')->store('public/pdf');
        $url= Storage::url($pdf);

        $propuesta = new Propuesta();
        $propuesta->fecha = Carbon::now();
        $propuesta->documento = $url;
        $propuesta->estado=1;
        $propuesta->estudiante_rut=$alumno->rut;
        
        $propuesta->save();
        return redirect()->route('alumnos.ingresado',$alumno->rut);

    }

    public function verComentarios(Propuesta $id)
    {
        $estudiantes = Estudiante::orderBy('nombre')->get();
        $profesores   = Profesor::orderBy('nombre')->get();
        $alumno     = Estudiante::where('rut',$id->estudiante_rut)->orderBy('nombre')->first();
        $comentarios = $id->profesoresConPivot()->get();
        return view('alumnos.comentarios',compact(['id','profesores','estudiantes','alumno','comentarios']));

    }
    
    // public function destroyPropuesta(Estudiante $alumno, Propuesta $propuesta)
    // {
    //     $url = $propuesta->documento;
    //     // dd($url);
    //     Storage::delete($url);
    //     // $propuesta->delete();
        
    //     // return redirect()->route('alumnos.ingresado',$alumno->rut);
    // }
}
