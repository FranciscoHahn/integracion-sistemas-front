@extends('layout.mainlayout')
@section('content')
    <style>


    </style>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top opacity-100 topnav" style="background-color: #212121;">
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
                <a class="navbar-brand mt-2 mt-lg-0" href="#" style="color: #1db954;">
                    <i class="fas fa-guitar" style="color: #1db954;"></i>&nbsp;&nbsp;Music Pro | <small
                        class="text-muted">&nbsp;catálogo de productos</small>
                </a>

                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a class="link-secondary me-3" title="catálogo" href="././catalogo">
                    <i class="fa-sharp fa-solid fa-shop neon-active"></i>
                </a>
                @if (Session::get('data_cliente')['email'] != env('ANON_USER'))
                    <a class="link-secondary me-3" title="mis compras" href="././mis-compras">
                        <i class="fas fa-truck solo-neon-icon-blue" style="color: #white;"></i>
                    </a>
                @endif


                <!-- Icon -->
                <a class="link-secondary me-3" id="link-compra" href="././resumen-compra">
                    <i class="fas fa-shopping-cart carrito-comprar" aria-hidden="true" style=""></i>
                </a>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="././logout" title="Salir">
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
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Catálogo</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach ($data as $instrumento)
                    @if ($instrumento['activo'] && $instrumento['stock'] >= 1)
                        <div class="col mb-5">

                            <div class="card h-100"
                                style="background-color: #212121; color: #b3b3b3; border: 2px solid #b3b3b3;">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ $instrumento['imagen'] }}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $instrumento['nombre'] }}</h5>
                                        <h6 class="fw-bolder">{{ $instrumento['nombre_categoria'] }}</h6>
                                        <!-- Product price-->
                                        {{ "$ " . number_format($instrumento['precio'], 0, ',', '.') }}
                                    </div>

                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class='btn  btn-outline-success addalcarrito'
                                            data-id="{{ $instrumento['id'] }}">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                        <button type="button" class='btn btn-success cantidad'
                                            data-max="{{ $instrumento['stock'] }}">
                                            0
                                        </button>
                                        <button type="button" class='btn  btn-outline-success removecarrito'
                                            data-id="{{ $instrumento['id'] }}">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
