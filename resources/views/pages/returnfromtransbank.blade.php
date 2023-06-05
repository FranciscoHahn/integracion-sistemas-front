
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
        color: #fff;
        animation: glow 1s ease-in-out infinite alternate;
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
                <i class="fas fa-guitar" style="color: #1db954;"></i>&nbsp;&nbsp;Music Pro | <small class="text-muted">&nbsp;Resumen de su compra</small>
            </a>

            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <a class="link-secondary me-3" title="mis compras" href="././mis-compras">
                <i class="fa-solid fa-truck-clock"></i>
            </a>
            <!-- Icon -->
            <a class="link-secondary me-3" href="#">
                <i class="fas fa-shopping-cart carrito-comprar" aria-hidden="true" style=""></i>
            </a>


        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<!-- Header-->
<header class="py-5 mt-5">
    <div class="container text-white text-center">
        Compra finalizada<br/><br/>
        <div class="d-flex justify-content-center mx-4">
            <a type="submit" class="btn btn-outline-success btn-outline-change" href="././catalogo">Volver al catálogo</a>
        </div>
    </div>
</header>
<!-- Section-->

<!-- Footer-->
@endsection

