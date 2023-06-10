<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Propuesta;
use App\Models\Estudiante;
use Carbon\Carbon;


class ProfesoresController extends Controller
{
    public function index()
    {
        $profesores    = Profesor::orderBy('nombre')->get();
        $estudiantes    = Estudiante::orderBy('nombre')->get();
        $propuestas    = Propuesta::orderBy('id')->get();   

        return view('profesores.index',compact(['profesores','estudiantes','propuestas']));
    }
    public function profesorIngresar(Request $request)
    {
        // $alumno = $estudiante->where('rut', $request->alumno)->get();
        $id_profesor = $request->profesor;
        $rut_estudiante = $request->alumno;
        $propuesta = Propuesta::where('estudiante_rut',$rut_estudiante)->orderByDesc('fecha')->first();

        $existe = $propuesta->profesoresConPivot()->find($id_profesor);
        if(empty($existe))
        {
            return redirect()->route('profesor.ingresado',[$id_profesor,$propuesta->id]);
        }else
        {
            return redirect()->route('profesor.verComentarios',[$id_profesor,$propuesta->id]);
        }
        
    }
    public function profesorIngresado(Profesor $profesor,Propuesta $propuesta)  
    {
        $propuestas     = Propuesta::orderBy('id')->get();
        $estudiantes     = Estudiante::orderBy('rut')->get();
        $profesores     = Profesor::orderBy('id')->get();
        return view('profesores.profesor',compact(['profesor','propuesta','propuestas','estudiantes','profesores']));
    }

    public function agregarComentarios(Request $request, Profesor $profesor, Propuesta $propuesta){
        $propuesta->profesores()->attach($profesor->id,['fecha'=>Carbon::now(),'hora'=>Carbon::now()->format('H:i:s'),'comentario'=>$request->comentarios]);
        return redirect()->route('profesores.ingresar');
    }

    public function profesorComentarios(Profesor $profesor, Propuesta $propuesta){
        $propuestas     = Propuesta::orderBy('id')->get();
        $estudiantes     = Estudiante::orderBy('rut')->get();
        $profesores     = Profesor::orderBy('id')->get();

        $comentario = $propuesta->profesoresConPivot()->where('profesor_id',$profesor->id)->first();

        return view('profesores.comentarios',compact(['profesor','propuesta','propuestas','estudiantes','profesores','comentario']));
    }
    public function editarComentarios(Request $request, Profesor $profesor, Propuesta $propuesta)
    {
        $propuesta->profesoresConPivot()->updateExistingPivot($profesor->id,['fecha'=>Carbon::now(),'hora'=>Carbon::now()->format('H:i:s'),'comentario'=>$request->comentarios]);
        return redirect()->route('profesores.ingresar');
    }
    public function borrarComentarios(Profesor $profesor, Propuesta $propuesta)
    {
        // $propuesta->profesoresConPivot()->updateExistingPivot($profesor->id,['fecha'=>Carbon::now(),'hora'=>Carbon::now()->format('H:i:s'),'comentario'=>$request->comentarios]);
        // return redirect()->route('profesores.ingresar');
        $propuesta->profesoresConPivot()->detach($profesor->id);
        return redirect()->route('profesores.ingresar');
    }










        
}
