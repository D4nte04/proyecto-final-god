
@extends('templates/templates')

@section('principal')

    {{-- principal --}}


    <div class="row mt-5 mb-3">
        <div class="col-1 p-0"></div>
        <div class="col-2 p-0 text-info">
            <h3>Seleccione su nombre:</h3>
        </div>
        <div class="col-2 text-info ms-4 ps-2">
            <form action="{{route('alumnos.ingresar')}}" method="POST">
                @csrf
                <select class="form-control border-vanilla ms-5 w-5" name="alumno">
                    <option selected disabled>Seleccione su nombre</option>
                    @foreach ($estudiantes as $estudiante)
                    <option value="{{$estudiante->rut}}">{{$estudiante->nombre.' '.$estudiante->apellido}}</option> 
                    @endforeach
                </select>
        </div>
        <div class="col-2" style="margin-left:70px">
                <button class="btn btn-dark text-white me-1 fw-bold" type="submit" style="width: 110px;">Acceder</button>
            </form>
        </div>
                
    </div>
    <div class="row mt-4">
        <div class="col-1"></div>
        <div class="col-10 p-0">
            <table class="table table-bordered table-tabla border-vanilla table-striped">
                <tbody>
                    <tr>
                        <th class="text-info">RUT</th>
                        <th class="text-info">Nombre Completo</th>
                        <th class="text-info">Email</th>

                    </tr>
                    <tr>
                        <td class="text-info">{{$alumno->rut}}</td>
                        <td class="text-info">{{$alumno->nombre.' '.$alumno->apellido}}</td>
                        <td class="text-info">{{$alumno->email}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <div class="col-1 p-0"></div>
        <div class="col-10 p-0 text-info">
            <h3>Estado de la Entrega</h3>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-10 p-0">
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
                        <td class="text-info"><b>Nombre:  </b> {{$comentario->nombre .' '.$comentario->apellido}} <br> <b>Email:  </b> {{$comentario->email}}</td>
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
    
