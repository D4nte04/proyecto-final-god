<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/scss/custom.css')}}">
    <title>Sistema para Entrega de Propuesta</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid px-0">
            <div class="ps-md-5 ps-2 pe-0" style="width: max-content;">
                <img class="img-fluid" style="width: 100px;" src="{{asset('img/isotipo_usm_color.jpg')}}">
            </div>
            <div class="mt-3 ps-md-3 text-info">
                <small class="fw-semibold">Universidad</small><br>
                <small class="fw-semibold">Federico Santa María</small>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
                @yield('principal-admin')
                <span class="navbar-text ms-5 ">
                    <a href="#" class="btn btn-logout text-info text-decoration-none d-none d-md-block me-4">Cerrar Sesión</a>
                </span>
                
                
                <div class="d-flex d-md-none mx-3 mt-3">
                    <a href="#" class="btn btn-logout text-info text-decoration-none w-100">Cerrar Sesión</a>
                    
                </div>
                

                
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12 p-3 bg-dark text-white">
                <h1 class="fw-bolder ps-2">(TSI1-2023) Taller de Sistemas de Información I</h1>
            </div>
        </div>
        
        @yield('principal')
        

        <!-- <input type="file" accept="application/pdf"> -->

        


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    
</body>
</html>