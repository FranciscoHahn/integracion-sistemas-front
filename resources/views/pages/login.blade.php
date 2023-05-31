
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

    .btn-outline-change:hover {
        background-color: white !important;
        color: black !important;
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
                                    <i class="fas fa-guitar" style=""></i>&nbsp;&nbsp;Music Pro
                                </h2>
                                <p class="text-white-50 mb-5"></p>
                                @if(isset($mensaje_registro))
                                <div class="justify-content-evenly rounded mb-2" style="background-color:#1db954; color:white;">
                                    <p>{{$mensaje_registro}}</p>
                                </div>
                                @endif

                                <form method="POST" action="../public/login">
                                    <div class="form-outline  mb-4">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email"/>
                                        <label class="form-label" style="color:white;" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline  mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
                                        <label class="form-label" style="color:white" for="typePasswordX">Password</label>
                                    </div>
                                    @csrf
                                    @if(isset($mensaje_error))
                                    <div class="justify-content-evenly rounded mb-2" style="background-color:red; color:white;">
                                        <p>{{$mensaje_error}}</p>
                                    </div>
                                    @endif

                                    <button class="btn btn-outline-light btn-outline-change btn-lg px-5" type="submit">Ingresar</button>
                                </form>

                            </div>

                            <div>
                                <p class="mb-0">No tiene cuenta? <a href="../public/registro" class="text-white fw-bold">Regístrese</a>

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
