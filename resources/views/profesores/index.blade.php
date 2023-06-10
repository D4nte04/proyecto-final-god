
@extends('templates/templates')

@section('principal')

    {{-- principal --}}


    <div class="row mt-3 mb-3">
        <div class="col-2 p-0 ms-5 text-info">
            <h3>Seleccionar:</h3>
        </div>
        <div class="col-6 text-info ms-4 ps-2">
            <form action="{{route('profesores.index')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <select class="form-control border-vanilla" name="profesor">
                            <option selected disabled>Seleccione el Profesor:</option>
                            @foreach ($profesores as $profesor)
                            <option value="{{$profesor->id}}">{{$profesor->nombre.' '.$profesor->apellido}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <select class="form-control border-vanilla" name="alumno">
                            <option selected disabled>Seleccione propuesta del alumno</option>
                            @foreach ($estudiantes as $estudiante)
                                @foreach ($propuestas as $propuesta)
                                    @if($estudiante->rut == $propuesta->estudiante_rut)
                                        <option value="{{$estudiante->rut}}">{{$estudiante->nombre.' '.$estudiante->apellido}}</option>
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
                
    </div>      



    <!-- <input type="file" accept="application/pdf"> -->


    {{-- principal --}}
@endsection
    
