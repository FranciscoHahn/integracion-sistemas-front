
@extends('layout.mainlayout')
@section('content')
<style>
    .form-outline .form-control:focus~.form-notch .form-notch-leading {
        border-top: .125rem solid #1db954;
        border-bottom: .125rem solid #1db954;
        border-left: .125rem solid #1db954;
        box-shadow:-1px 0px 0px 0px #1db954, 0px 1px 0px 0px #1db954, 0px -1px 0px 0px #1db954;
    }
    .form-outline .form-control:focus~.form-notch .form-notch-middle {
        border-bottom: .125rem solid;
        border-color: #1db954;
        border-top:none;
        box-shadow: 0 1px 0 0 #1db954;
    }

    .form-outline .form-control:focus~.form-notch .form-notch-trailing {
        border-color: currentcolor currentcolor currentcolor #1db954;
        border-bottom: .125rem solid #1db954;
        border-right: .125rem solid #1db954;
        border-top: .125rem solid #1db954;
        box-shadow: 1px 0 0 0 #1db954, 0 -1px 0 0 #1db954, 0 1px 0 0 #1db954;
    }



    .form-outline .form-control:focus~.form-label {
        color: #1db954;
    }

    .form-outline .form-control:hover{
        box-shadow:-1px 0px 0px 0px #1db954, 0px 1px 0px 0px #1db954, 0px -1px 0px 0px #1db954;
    }




    .form-outline .form-control:hover~.form-label {
        color: #1db954;
    }



    .form-outline .form-control.active~.form-notch .form-notch-middle, .form-outline .form-control:focus~.form-notch .form-notch-middle {
        border-top: 1px transparent;
    }

    input, select, textarea{
        color: white !important;
    }


    .btn-outline-success:hover {
        background-color: #1db954 !important;
        color: white !important;
    }

    .btn-outline-success {
        border-color: #1db954 !important;
        color: #1db954 !important;
    }


</style>


<div class="bg-image" 
     style="background-image: url('https://wallpapercosmos.com/w/full/b/e/0/1169501-3840x2160-desktop-4k-musical-instruments-wallpaper-image.jpg');
     height: 100vh">



    <div class="vh-100 gradient-custom opacity-85">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">
                                    <i class="fas fa-guitar" style=""></i>&nbsp;&nbsp;Music Pro | Registro
                                </h2>
                                <p class="text-white-50 mb-5"></p>
                                <form class="mx-1 mx-md-4" method="POST" action="././registro-process">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" name="nombre" class="form-control" style="color: white;"/>
                                            <label class="form-label" style="color: white;" for="form3Example1c">Nombre</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="form3Example1c" name="apellido" class="form-control" style="color: white;"/>
                                            <label class="form-label" style="color: white;" for="form3Example1c">Apellido</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="form3Example3c" name="email" class="form-control" />
                                            <label class="form-label" style="color: white;" for="form3Example3c">Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="number" id="form3Example3c" name="telefono" class="form-control" />
                                            <label class="form-label" style="color: white;" for="form3Example3c">Teléfono</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" name="password1" class="form-control" />
                                            <label class="form-label" style="color: white;" for="form3Example4c">Contraseña</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cd" name="password2" class="form-control" />
                                            <label class="form-label" style="color: white;" for="form3Example4cd">Repita su contraseña</label>
                                        </div>
                                    </div>
                                    @if(isset($mensaje))
                                    <div class="justify-content-evenly rounded mb-2" style="background-color:red">
                                        <p>{{$mensaje}}</p>
                                    </div>
                                    @endif

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-outline-success btn-outline-change">Crear cuenta</button>
                                    </div>
                                    @csrf

                                </form>
                            </div>

                            <div>
                                <p class="mb-0">No tiene cuenta? <a href="#!" class="text-white fw-bold">Regístrese</a>

                            </div>

                            <!--div>
                                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
