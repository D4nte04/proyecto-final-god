
@extends('templates/templates')

@section('principal')
{{-- {{dd($profesor)}}     --}}
{{-- principal --}}


    <div class="row mt-3 mb-3">
        <div class="col-1 p-0 ms-5 text-info">
            <h4>Bienvenido:</h4>
        </div>
        <div class="col-6 text-info ms-4 ps-2">
            <form action="{{route('profesores.index')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-5">
                        <select class="form-control border-vanilla" name="profesor">
                            {{-- <option selected disabled>Seleccione el Profesor:</option> --}}
                            @foreach ($profesores as $profe)
                                <option @if($profe->id==$profesor->id) selected @endif
                                     value="{{$profe->id}}">{{$profe->nombre.' '.$profe->apellido}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <h4>Propuesta:</h4>
                    </div>
                    <div class="col-5">
                        <select class="form-control border-vanilla" name="alumno">
        
                            @foreach ($estudiantes as $estudiante)
                                @foreach ($propuestas as $prop)
                                    @if($estudiante->rut == $prop->estudiante_rut)
                                        <option @if($propuesta->estudiante_rut == $estudiante->rut) selected @endif value="{{$estudiante->rut}}">{{$estudiante->nombre.' '.$estudiante->apellido}}</option>
                                    @endif
                            @endforeach
                            
                             
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
        <div class="col-2" style="margin-left:70px">
                <button class="btn btn-dark text-white me-1 fw-bold" type="submit" style="width: 110px;">Acceder</button>
            </form>
        </div>
        <div class="row mt-5">
            <div class="col-1"></div>
            <div class="col-10 p-0">
                <table class="table table-bordered table-tabla border-vanilla table-striped">
                    <thead>
                        <tr>
                            <th class="">Propuesta</th>
                            <th>Fecha Entrega</th>
                            <th class="d-flex justify-content-center">Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td class="text-info ">
                                <a href="{{$propuesta->documento}}">
                                    {{$propuesta->id}}
                                </a>
                            </td>
                            <td class="text-info">{{$propuesta->fecha}}</td>
                            <td class="text-info">
                                <form method="POST"  action="{{route('profesor.comentarios',[$profesor->id,$propuesta->id])}}">
                                    @csrf
                                    <textarea placeholder="Retroalimentación..." rows="4" cols="50" name="comentarios" class="form-control"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                                    <button class="btn btn-dark text-white fw-bold" type="submit" style="width: 210px;">Agregar Comentarios</button>
                                </form>
                </div>
            </div>
        </div>
                
    </div>      



    

    {{-- principal --}}
@endsection
    
