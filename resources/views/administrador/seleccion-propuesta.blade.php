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
                            <option disabled selected>Seleccionar propuesta</option>
                            @foreach ($estudiantes as $estudiante)
                                @foreach ($propuestas as $prop)
                                    @if($estudiante->rut == $prop->estudiante_rut)
                                    {{-- @if($prop->estudiante_rut == $estudiante->rut) selected @endif --}}
                                        <option value="{{$estudiante->rut}}">{{$estudiante->nombre.' '.$estudiante->apellido}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 d-flex flex-column justify-content-end">
                        <button class="btn btn-dark text-white me-1 fw-bold" type="submit" style="width: 110px;">Acceder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>      
    {{-- principal --}}
@endsection