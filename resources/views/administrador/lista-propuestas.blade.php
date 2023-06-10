@extends('templates/templates')
@section('principal-admin')
    <ul class="navbar-nav me-5">
        <li class="nav-item">
        <a class="nav-link" href="{{route('prof.lista.alum')}}">Gestión Alumnos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('prof.lista.prof')}}">Gestión Profesores</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('prof.lista.prop')}}">Estado de Propuestas</a>
        </li>
  </ul>
@endsection
@section('principal')
    <div class="row mt-4 mb-3">
        <div class="col text-info ms-5">
            <form action="{{route('admin.propuesta')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8 ms-5">
                        <label for="alumno">Elija la propuesta del alumno:</label>
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
                    <div class="col-2 d-flex flex-column justify-content-end" style="padding-bottom: 1px">
                        <button class="btn btn-dark text-white me-1 fw-bold" type="submit" style="width: 110px;">Acceder</button>
                    </div>
                </div>
                
                
            </form>
            
                
        </div>
        
    </div>      

    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-5 p-0">
            <table class="table table-bordered table-tabla border-vanilla table-striped">
                <thead>
                    <tr>
                        <th style="width: 150px">Propuesta</th>
                        <th style="width: 150px">Fecha Entrega</th>
                        <th style="width: 250px">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td class="text-info">
                            <a href="{{$propuesta->documento}}">
                                {{$propuesta->id}}
                            </a>
                        </td>
                        <td class="text-info">{{$propuesta->fecha}}</td>
                        <td>
                            <form action="{{route('admin.cambiarEstado',$propuesta->id)}}" method="POST">
                                @method('put')
                                @csrf
                                <select class="form-control border-vanilla mt-2" name="estado">
                                    <option @if($propuesta->estado == 1) selected @endif value="1">Esperando Revision</option>
                                    <option @if($propuesta->estado == 2) selected @endif value="2">Modificar Propuesta</option>
                                    <option @if($propuesta->estado == 3) selected @endif value="3">Rechazado</option>
                                    <option @if($propuesta->estado == 4) selected @endif value="4">Aceptado</option>
                                </select>
                                <div class="d-flex justify-content-end mt-2">
                                    <button class="btn btn-dark text-white fw-bold" type="submit" style="width: 100px;">Guardar</button>
                                </div>
                            </form>
                        </td>
                        
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-9"><h4>Comentarios de la propuesta</h4></div>
    <div class="row mt-3">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-bordered table-tabla border-vanilla table-striped">
                <thead>
                    <tr>
                        <th style="width: 450px">Datos Profesor</th>
                        <th>Fecha Comentario</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comentarios as $comentario)
                        <tr> 
                            <td class="text-info"><b>ID: </b> {{$comentario->pivot->profesor_id}} <br> <b>Nombre:  </b> {{$comentario->nombre .' '.$comentario->apellido}} <br> <b>Email:  </b> {{$comentario->email}}</td>
                            <td class="text-info">{{$comentario->pivot->fecha}} <br><br> {{$comentario->pivot->hora}}</td>
                            <td>
                                <textarea readonly placeholder="Retroalimentación..." rows="4" cols="50" name="comentarios" class="form-control border-vanilla">{{$comentario->pivot->comentario}}</textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        



        


   

    <!-- <input type="file" accept="application/pdf"> -->


    {{-- principal --}}
@endsection