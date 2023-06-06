
@extends('layout.internolayout')
@section('content')


<div class="bg-image" 
     style="background-image: url('https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77701297520.jpg');
     height: 100vh">



    <div class="vh-100 gradient-custom opacity-85">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2">
                                    <i class="fas fa-guitar" style=""></i>&nbsp;&nbsp;Music Pro | Ingreso empleados
                                </h2>
                                <p class="text-white-50 mb-5"></p>
                                @if(isset($mensaje_registro))
                                <div class="justify-content-evenly rounded mb-2" style="background-color:#1db954; color:white;">
                                    <p>{{$mensaje_registro}}</p>
                                </div>
                                @endif

                                <form method="POST" action="../public/interno-login">
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
