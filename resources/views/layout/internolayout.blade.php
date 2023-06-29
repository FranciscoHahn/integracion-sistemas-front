<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.css"
        rel="stylesheet" />

    <title>Music Pro</title>
    <style>
        html,
        body {
            height: 100%;
        }
    </style>

</head>

<body
    style="background-image: linear-gradient(rgba(31, 30, 30, 0.9), rgba(54, 53, 53, 0.9)), url('https://static.vecteezy.com/system/resources/thumbnails/017/200/664/original/colorful-glowing-music-equalizer-animation-on-black-background-audio-spectrum-music-background-loop-animation-of-equalizer-multicolored-sound-equalizer-animation-nightclub-and-disco-background-free-video.jpg') !important;   background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;height: 100% !important;">
    <style>
        .link-secondary :hover {
            color: cyan;
        }

        .link-out {
            color: azure;
        }

        .link-out :hover {
            color: #FF3131;
        }

        .link-secondary .active {
            color: cyan;
        }
    </style>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark opacity-75" style="">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" style="color: #91ffff;" href="{{ route('interno-ini') }}">
                    <i class="fas fa-guitar" style=""></i>&nbsp;&nbsp;Music Pro | <small
                        class="text-white">&nbsp;Panel de {{ Session::get('perfil') }} </small>
                </a>

                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a class="link-secondary active me-3" title="Administración de usuarios" href="{{ route('usuarios') }}">
                    <i class="fa-sharp fa-solid fa-users" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Entregas" href="{{route('entregas')}}">
                    <i class="fas fa-truck" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Productos" href="{{ route('admin-instrumentos') }}">
                    <i class="fas fa-guitar" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Clientes" href="{{ route('admin-clientes') }}">
                    <i class="fas fa-user" style="color: #white;"></i>
                </a>
                <a class="link-secondary me-3" title="Reportes" href="#">
                    <i class="fas fa-list" style="color: #white;"></i>
                </a>
                <a class="link-out me-3" title="Salir del sistema" href="{{ route('logoutinterno') }}">
                    <i class="fas fa-sign-out" style="color: #white;"></i>
                </a>

            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <div class="container" style="padding-top: 58px;">

        @yield('content')

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- MDB -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                language: {
                    "sProcessing": "<small>Procesando...</small>",
                    "sLengthMenu": "<small>Mostrar _MENU_ registros</small>",
                    "sZeroRecords": "<small>No se encontraron resultados</small>",
                    "sEmptyTable": "<small>Ningún dato disponible en esta tabla</small>",
                    "sInfo": "<small>Registros del _START_ al _END_ de un total de _TOTAL_</small>",
                    "sInfoEmpty": "<small>registros del 0 al 0 de un total de 0 registros</small>",
                    "sInfoFiltered": "<small>(filtrado de un total de _MAX_ registros)</small>",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "<small>Cargando...</small>",
                    "oPaginate": {
                        "sFirst": "<small>Primero</small>",
                        "sLast": "<small>Último</small>",
                        "sNext": "&rarr;",
                        "sPrevious": "&larr;"
                    },
                    "oAria": {
                        "sSortAscending": ": <small>Activar para ordenar la columna de manera ascendente</small>",
                        "sSortDescending": ": <small>Activar para ordenar la columna de manera descendente</small>"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>

</body>

</html>
