@extends('layout.internolayout')
@section('content')
    <style>
        th,
        td {
            padding: 15px;
        }

        .border-primary {
            border-color: #4dfed1 !important;
        }
    </style>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top opacity-100 topnav-interno" style="background-color: #212121;">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#" style="color: #91ffff;">
                    <i class="fas fa-guitar" style="color: #91ffff;"></i>&nbsp;&nbsp;Music Pro | <small
                        class="text-muted">&nbsp;Panel de {{ Session::get('perfil') }} </small>
                </a>

                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a class="link-secondary me-3" title="Administración de usuarios" href="{{route('usuarios')}}">
                    <i class="fa-sharp fa-solid fa-users  neon-active" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Entregas" href="#">
                    <i class="fas fa-truck" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Productos" href="././admin-instrumentos">
                    <i class="fas fa-guitar" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Clientes" href="././admin-clientes">
                    <i class="fas fa-user" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Reportes" href="#">
                    <i class="fas fa-list" style="color: #white;"></i>
                </a>

                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="././logoutinterno" title="Salir">
                    <i class="fa fa-sign-out solo-neon-icon-red" aria-hidden="true" style="color:white">

                    </i>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    <!-- Header-->
    <header class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-white d-flex justify-content-center">
                <div class="col-9">
                    <div class="d-block p-2">
                        <h3>Crear usuario</h3>
                    </div>
                    @if (isset($mensaje))
                        <div class="justify-content-evenly rounded mb-2" style="background-color:red">
                            <p>{{ $mensaje }}</p>
                        </div>
                        @if ($errores)
                            <ul>
                                @foreach ($errores as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    @endif

                    <form class="col-12" method="POST" action="{{ route('registrandousuario') }}">
                        @csrf
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example1c" name="nombres" class="form-control"
                                    style="color: white;" />
                                <label class="form-label" style="color: white;" for="form3Example1c">Nombre</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example1c" name="apellidos" class="form-control"
                                    style="color: white;" />
                                <label class="form-label" style="color: white;" for="form3Example1c">Apellido</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example1c" name="rut" class="form-control"
                                    style="color: white;" />
                                <label class="form-label" style="color: white;" for="form3Example1c">Rut</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="email" id="form3Example3c" name="email" class="form-control" />
                                <label class="form-label" style="color: white;" for="form3Example3c">Email</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example3c" name="nombreusuario" class="form-control" />
                                <label class="form-label" style="color: white;" for="form3Example3c">Nomde de
                                    usuario</label>
                            </div>
                        </div>


                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example3c" name="direccion" class="form-control" />
                                <label class="form-label" style="color: white;" for="form3Example3c">Dirección</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="password" id="form3Example4c" name="password1" class="form-control" />
                                <label class="form-label" style="color: white;" for="form3Example4c">Contraseña</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="password" id="form3Example4cd" name="password2" class="form-control" />
                                <label class="form-label" style="color: white;" for="form3Example4cd">Repita su
                                    contraseña</label>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <select class="form-select bg-dark text-white" name="perfil_id"
                                    aria-label="Default select example">
                                    @foreach ($perfiles as $perfil)
                                        <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-outline-success btn-outline-change">Crear
                                cuenta</button>
                        </div>
                        @csrf



                    </form>


                </div>

            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            </div>
        </div>
    </section>
@endsection
