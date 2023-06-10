<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\Propuesta;

class AdministradorController extends Controller
{
    public function indexAdmin()
    {
        $estudiantes = Estudiante::all();
        $profesores = Profesor::all();
        $propuestas = Propuesta::all();
        return view('administrador.index',compact(['estudiantes','profesores','propuestas']));
    }
    public function listaAlum()
    {
        $estudiantes = Estudiante::orderBy('nombre')->get();
        return view('administrador.lista-alumnos',compact('estudiantes'));
    }
    public function listaProf()
    {
        $profesores = Profesor::orderBy('nombre')->get();
        return view('administrador.lista-profesores',compact('profesores'));
    }
    public function listaProp(Propuesta $propuesta)
    {
        $estudiantes = Estudiante::orderBy('nombre')->get();
        $propuestas = Propuesta::orderBy('id')->get();
        return view('administrador.seleccion-propuesta',compact(['propuestas','estudiantes']));
    } 
   
    public function ingresarAlum()
    {
        return view('administrador.agregar-alumno');
    }
    public function ingresarProf()
    {
        return view('administrador.agregar-profesor');
    }
    //mover a admincontroller
    public function agregarProfesor(Request $request){
        $profesor = new Profesor();
        $profesor->nombre = $request->nombre;
        $profesor->apellido = $request->apellido;
        $profesor->email = $request->email;
        $profesor->save();
        return redirect()->route('prof.lista.prof');
    }
    //
    public function agregarAlumno(Request $request){
        $alumno = new Estudiante();
        $alumno->rut = $request->rut;
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->email = $request->email;
        $alumno->save();
        return redirect()->route('prof.lista.alum');
    }
    public function propuestaAdmin(Request $request){
        $propuesta = Propuesta::where('estudiante_rut',$request->alumno)->orderByDesc('fecha')->first();
        return redirect()->route('admin.propuesta.estado',$propuesta);
    }
    public function propuestaEstado(Propuesta $propuesta)
    {
        $estudiantes = Estudiante::orderBy('nombre')->get();
        $propuestas = Propuesta::orderBy('id')->get();
        $comentarios = $propuesta->profesoresConPivot()->get();
        return view('administrador.lista-propuestas',compact(['propuestas','estudiantes','propuesta','comentarios']));
    }
    public function cambiarEstado(Request $request, Propuesta $propuesta)
    {
        $propuesta->estado = $request->estado;
        $propuesta->save();
        return redirect()->route('prof.lista.prop');
    }
}
