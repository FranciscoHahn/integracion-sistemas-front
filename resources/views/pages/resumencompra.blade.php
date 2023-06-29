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
            box-shadow: 5px 5px 10px 0px rgba(0, 255, 255, 0.7) !important;

        }

        .form-outline .form-control:focus~.form-notch .form-notch-leading {
            border-top: .125rem solid #1db954;
            border-bottom: .125rem solid #1db954;
            border-left: .125rem solid #1db954;
            box-shadow: -1px 0px 0px 0px #1db954, 0px 1px 0px 0px #1db954, 0px -1px 0px 0px #1db954;
        }

        .form-outline .form-control:focus~.form-notch .form-notch-middle {
            border-bottom: .125rem solid;
            border-color: #1db954;
            border-top: none;
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

        .form-outline .form-control:hover {
            box-shadow: -1px 0px 0px 0px #1db954, 0px 1px 0px 0px #1db954, 0px -1px 0px 0px #1db954;
        }




        .form-outline .form-control:hover~.form-label {
            color: #1db954;
        }



        .form-outline .form-control.active~.form-notch .form-notch-middle,
        .form-outline .form-control:focus~.form-notch .form-notch-middle {
            border-top: 1px transparent;
        }

        input,
        select,
        textarea {
            color: white !important;
        }

        .btn-outline-change:hover {
            color: #fff;
            animation: glow 1s ease-in-out infinite alternate;
        }

        .solo-neon-icon {
            color: white;
            text-shadow: 0 0 3px rgba(0, 255, 255, 0.7);
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

        .solo-neon-icon-red:hover {
            /**esta wea es bright red**/
            color: #EE4B2B !important;
            text-shadow: 0 0 8px #EE4B2B;
        }


        .solo-neon-icon-blue:hover {
            /**esta wea es bright red**/
            color: #00FFFF !important;
            text-shadow: 0 0 8px #00008B;
        }
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
                        class="text-muted">&nbsp;Resumen de su compra</small>
                </a>

                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a class="link-secondary me-3" title="catálogo" href="././catalogo">
                    <i class="fa-sharp fa-solid fa-shop"></i>
                </a>
                @if (Session::get('data_cliente')['email'] != env('ANON_USER'))
                    <a class="link-secondary me-3" title="mis compras" href="././mis-compras">
                        <i class="fas fa-truck solo-neon-icon-blue" style="color: #white;"></i>
                    </a>
                @endif

                <!-- Icon -->
                <a class="link-secondary me-3" id="link-compra" href="././resumen-compra">
                    <i class="fas fa-shopping-cart carrito-comprar neon" aria-hidden="true" style=""></i>
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
    <header class="py-5 mt-5">
        <div class="container">
            <div class="text-white">
                <h3 class="">Resumen de su compra</h3>
                <div class='row'>
                    <div class="table-responsive col-6 seleccionado rounded">
                        <table class="table text-white">
                            <?php $total = 0; ?>
                            @foreach ($resumen_compra as $resumen)
                                <tr>
                                    <td>
                                        {{ $resumen->nombre }}&nbsp;({{ $resumen->cantidad }})
                                        <br />
                                        {{ $resumen->nombre_categoria }}
                                        <br />
                                        {{ "$ " . number_format($resumen->precio * $resumen->cantidad, 0, ',', '.') }}
                                        <br />
                                        (precio unitario $&nbsp;{{ number_format($resumen->precio, 0, ',', '.') }})
                                        <?php $total = $total + $resumen->precio * $resumen->cantidad; ?>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="col-6 mr-5">
                        <div class="mx-4 mb-4">

                            {{ "Total: $ " . number_format($total, 0, ',', '.') }}

                        </div>

                        <form method="POST" action="././comprar-process">
                            <!-- Default radio -->
                            <div class="form-check mx-4">
                                <input class="form-check-input" type="radio" name="tipo_entrega" value="domicilio"
                                    id="flexRadioDefault1" checked />
                                <label class="form-check-label" for="flexRadioDefault1"> Entrega a domicilio </label>
                            </div>

                            <!-- Default checked radio -->
                            <div class="form-check mx-4">
                                <input class="form-check-input" type="radio" name="tipo_entrega" value="tienda"
                                    id="flexRadioDefault2" />
                                <label class="form-check-label" for="flexRadioDefault2"> Retiro en tienda </label>
                            </div>
                            <br /><br />
                            <div class="form-outline mx-4">
                                <input type="text" id="typeEmailX" class="form-control form-control-lg"
                                    name="domicilio" />
                                <label class="form-label" style="color:white;" for="typeEmailX">Domicilio</label>
                            </div>
                            @if (isset($mensaje))
                                <br />
                                <div class="rounded  mx-4 opacity-70" style="background-color:red">
                                    <p>{{ $mensaje }}</p>
                                </div>
                            @endif

                            <br /><br /><br /><br />
                            <div class="d-flex justify-content-center mx-4">
                                <button type="submit" class="btn btn-outline-success btn-outline-change">Continuar con el
                                    pago</button>
                            </div>
                            @csrf
                            <input type="hidden" name="total_compra" value="{{ $total }}" />
                        </form>




                    </div>
                </div>





            </div>
        </div>
    </header>
    <!-- Section-->

    <!-- Footer-->
@endsection
