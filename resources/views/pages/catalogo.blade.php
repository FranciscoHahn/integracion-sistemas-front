@extends('layout.mainlayout')
@section('content')
<style>
    .topnav {
        border-bottom: 3px solid #1db954;
    }

    .btn-outline-success:hover {
        background-color: #1db954 !important;
        color: white !important;
    }

    .btn-outline-success {
        border-color: #1db954 !important;
        color: #1db954 !important;
    }

    .seleccionado {
        color: white !important; 
        background-color: #121212 !important;
        border: 2px solid #1db954 !important;
        box-shadow: 5px 5px 10px 0px rgba(0,255,255,0.7) !important;

    }

    .solo-neon-icon {
        color: white; 
        text-shadow: 0 0 3px rgba(0,255,255,0.7);
    }


    .neon {
        color: #fff;
        animation: glow 1s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from {
            text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #1db954, 0 0 20px #1db954, 0 0 25px #1db954, 0 0 30px #1db954, 0 0 35px #1db954;
        }
        to {
            text-shadow: 0 0 10px #fff, 0 0 5px #fff, 0 0 10px #1db954, 0 0 20px #1db954, 0 0 30px #1db954, 0 0 40px #1db954, 0 0 50px #1db954;
        }
    }

</style>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top opacity-100 topnav" style="background-color: #212121;">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#" style="color: #1db954;">
                <i class="fas fa-guitar" style="color: #1db954;"></i>&nbsp;&nbsp;Music Pro | <small class="text-muted">&nbsp;catálogo de productos</small>
            </a>

            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <a class="link-secondary me-3" title="mis compras" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
            </a>

            <!-- Icon -->
            <a class="link-secondary me-3" id="link-compra" href="././resumen-compra">
                <i class="fas fa-shopping-cart carrito-comprar" aria-hidden="true" style=""></i>
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
            @foreach($data as $instrumento)
            <div class="col mb-5">

                <div class="card h-100" style="background-color: #212121; color: #b3b3b3; border: 2px solid #b3b3b3;">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{$instrumento['imagen']}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$instrumento['nombre']}}</h5>
                            <h6 class="fw-bolder">{{$instrumento['nombre_categoria']}}</h6>
                            <!-- Product price-->
                            {{"$ ".number_format($instrumento['precio'], 0, ',', '.')}}
                        </div>

                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        <div class="btn-group" role="group">
                            <button type="button" class='btn  btn-outline-success addalcarrito' data-id="{{$instrumento['id']}}">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <button type="button" class='btn btn-success cantidad'>
                                0
                            </button>
                            <button type="button" class='btn  btn-outline-success removecarrito' data-id="{{$instrumento['id']}}">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
