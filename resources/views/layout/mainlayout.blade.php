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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

        .solo-neon-icon {
            color: white;
            text-shadow: 0 0 3px rgba(0, 255, 255, 0.7);
        }


        .neon-active {
            color: #fff;
            animation: glow-cyan 1s ease-in-out infinite alternate;
        }

        .neon {
            color: #fff;
            animation: glow-green 1s ease-in-out infinite alternate;
        }

        @keyframes glow-green {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #1db954, 0 0 20px #1db954, 0 0 25px #1db954, 0 0 30px #1db954, 0 0 35px #1db954;
            }

            to {
                text-shadow: 0 0 10px #fff, 0 0 5px #fff, 0 0 10px #1db954, 0 0 20px #1db954, 0 0 30px #1db954, 0 0 40px #1db954, 0 0 50px #1db954;
            }
        }

        @keyframes glow-red {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px red, 0 0 20px red, 0 0 25px red, 0 0 30px red, 0 0 35px red;
            }

            to {
                text-shadow: 0 0 10px #fff, 0 0 5px #fff, 0 0 10px red, 0 0 20px red, 0 0 30px red, 0 0 40px red, 0 0 50px red;
            }
        }

        @keyframes glow-cyan {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #00FFFF, 0 0 20px #00FFFF, 0 0 25px #00FFFF, 0 0 30px #00FFFF, 0 0 35px #00FFFF;
            }

            to {
                text-shadow: 0 0 10px #fff, 0 0 5px #fff, 0 0 10px #00FFFF, 0 0 20px #00FFFF, 0 0 30px #00FFFF, 0 0 40px #00FFFF, 0 0 50px #00FFFF;
            }
        }


        .solo-neon-icon-red:hover {
            color: #fff;
            animation: glow-red 1s ease-in-out infinite alternate;
        }


        .solo-neon-icon-blue:hover {
            color: #fff;
            animation: glow-green 1s ease-in-out infinite alternate;
        }
    </style>

    <title>Music Pro</title>
</head>

<body style="background-color: #121212;">
    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

    <script>
        $('.addalcarrito').on('click', function() {
            element = $(this);
            id = $(this).data("id");
            elemento = $(element).closest('div').find('.cantidad');
            maximo = $(elemento).data("max");
            html = $(element).closest('div').find('.cantidad').html();
            newhtml = parseInt(html) + 1;
            cantidad = 0;
            if (newhtml <= maximo) {
                if (newhtml >= 0) {
                    cantidad = newhtml;
                } else {
                    cantidad = 0;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: "POST",
                    url: "././articulo-carrito",
                    data: {
                        id: id,
                        cantidad: cantidad
                    },
                    datatype: "json",
                    success: function(result) {
                        console.log(JSON.stringify(result));
                        $(element).closest('div').find('.cantidad').html(newhtml);

                        if (newhtml >= 1 && !$(element).parents().eq(2).hasClass("seleccionado")) {
                            $(element).parents().eq(2).addClass("seleccionado shadow-4");
                        }
                        if (result == 0 && $(".carrito-comprar").hasClass("neon")) {
                            $(".carrito-comprar").removeClass("neon");
                        } else {
                            $(".carrito-comprar").addClass("neon");
                        }
                    }

                });
            }

        });


        $('.removecarrito').on('click', function() {
            element = $(this);
            id = $(this).data("id");
            html = $(element).closest('div').find('.cantidad').html();
            newhtml = parseInt(html) - 1;
            cantidad = 0;
            if (newhtml >= 0) {
                cantidad = newhtml;
            } else {
                cantidad = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type: "POST",
                url: "././articulo-carrito",
                data: {
                    id: id,
                    cantidad: cantidad
                },
                datatype: "json",
                success: function(result) {

                    console.log(JSON.stringify(result));
                    if (newhtml > 0) {
                        $(element).closest('div').find('.cantidad').html(newhtml);
                    } else if (newhtml == 0) {
                        $(element).closest('div').find('.cantidad').html(newhtml);
                        $(element).parents().eq(2).removeClass("seleccionado");
                        $(element).parents().eq(2).removeClass("shadow-4");
                    }

                    if (result == 0 && $(".carrito-comprar").hasClass("neon")) {
                        $(".carrito-comprar").removeClass("neon");
                    } else {
                        $(".carrito-comprar").addClass("neon");
                    }
                }

            });


        });


        $('#link-compra').click(function(event) {
            if (!$(".carrito-comprar").hasClass("neon")) {
                event.preventDefault();
            }
        });
    </script>


</body>

</html>
