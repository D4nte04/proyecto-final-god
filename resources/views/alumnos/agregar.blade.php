@extends('templates/templates')

@section('principal')
    {{-- principal --}}
    <div class="row mt-5">
        <div class="col-1 p-0"></div>
        <div class="col-10 p-0 text-info">
            <h3>Agregar archivo de {{$alumno->nombre.' '.$alumno->apellido}}</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-1 p-0"></div>
        <div class="col-10 p-0">
            <form method="POST" action="{{route('alumnos.store',$alumno->rut)}}" enctype="multipart/form-data">
                @csrf
                <div class="card border-vanilla">
                    <div class="card-body">
                        <label for="form-file" class="form-label text-info">Ingresar propuesta de proyecto en formato pdf</label>
                        <input class="form-control text-info border-vanilla" type="file" accept="application/pdf" id="form-file" name="pdf" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col col-12 d-flex justify-content-center">
                        <button class="btn btn-dark text-white me-1 fw-bold" type="submit" style="width: 110px;">Guardar</button>
                        <button class="btn btn-dark text-white ms-1 fw-bold" style="width: 110px;">Borrar</button>
                    </div>
                </div>

            </form>
            </div>
        </div>
    </div>
    
    
    

    <!-- <input type="file" accept="application/pdf"> -->

    
    {{-- principal --}}
@endsection