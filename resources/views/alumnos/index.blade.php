
@extends('templates/templates')

@section('principal')

    {{-- principal --}}


    <div class="row mt-3 mb-3">
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

    <div class="row mt-5 mb-3">
        <div class="col-1 p-0"></div>
        <div class="col-10 p-0 text-info">
            <h3>Estado de la Entrega</h3>
        </div>
    </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 p-0">
                <table class="table table-bordered table-tabla border-vanilla table-striped">
                    <tbody>
                        <tr>
                            <td class="text-info w-25">Estado de la entrega</td>
                            <td class="text-info">
                                --
                                {{-- No entregado --}}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-info">Documento</td>
                            <td class="text-info">
                                {{-- @foreach($propuestas as $propuesta)
                                <a href="{{$propuesta->documento}}">
                                    DOCUMENTO GOD
                                </a> 
                                @endforeach  --}}
                                --
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="text-info">Ultima modificacion</td>
                            <td class="text-info">--</td>
                        </tr>
                        <tr>
                            <td class="text-info">Comentarios Profesor</td>
                            <td class="text-info">--</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            <a href="#" class="btn btn-dark text-white pt-1 fw-bold">Agregar entrega</a>
        </div>
        <div class="col-12 d-none justify-content-center">
            <a href="#" class="btn btn-dark text-white pt-1 me-1 fw-bold" style="width: 8%;">Editar entrega</a>
            <a href="#" class="btn btn-dark text-white pt-1 ms-1 fw-bold" style="width: 8%;">Borrar entrega</a>
        </div>
    </div>


    <!-- <input type="file" accept="application/pdf"> -->


    {{-- principal --}}
@endsection
    
