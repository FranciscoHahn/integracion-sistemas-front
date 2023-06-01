<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
            />
        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
            />
        <!-- MDB -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
            rel="stylesheet"
            />
        <title>Music Pro</title>
    </head>
    <body style="background-color: #121212;">
        @yield('content')

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- MDB -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"
        ></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script>

            $('.addalcarrito').on('click', function () {
                element = $(this);
                id = $(this).data("id");
                html = $(element).closest('div').find('.cantidad').html();
                newhtml = parseInt(html) + 1;
                cantidad = 0;
                if (newhtml >= 0) {
                    cantidad = newhtml;
                } else {
                    cantidad = 0;
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    type: "POST",
                    url: "././articulo-carrito",
                    data: {id: id, cantidad: cantidad},
                    datatype: "json",
                    success: function (result) {
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


            });


            $('.removecarrito').on('click', function () {
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
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    type: "POST",
                    url: "././articulo-carrito",
                    data: {id: id, cantidad: cantidad},
                    datatype: "json",
                    success: function (result) {

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
            
            
        </script>


    </body>

</html>

