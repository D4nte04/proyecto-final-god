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
<div class="row mt-4">
    <div class="col-1">
    </div>
    <div class="col-8">
        <form action="{{route('crear.alumno')}}" method="POST">
        @csrf
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-7">
                    <div class="mb-3">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input class="form-control text-info border-vanilla" type="text" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="apellido">Apellido</label>
                        <input class="form-control text-info border-vanilla" type="text" id="apellido" name="apellido">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control text-info border-vanilla" type="email" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="rut">Rut</label>
                        <input class="form-control text-info border-vanilla" type="text" id="rut" name="rut">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-dark text-white me-2 fw-bold" type="submit" style="width: 110px;">Guardar</button>
                        <button class="btn btn-dark text-white ms-2 fw-bold" style="width: 110px;" type="reset">Borrar</button>
                    </div>
                </div>
            </div>
            
            
        </form>
    </div>
</div>
@endsection