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
    style="background-image: linear-gradient(rgba(29, 29, 29, 0.9), rgba(27, 27, 27, 0.9)), url('https://static.vecteezy.com/system/resources/thumbnails/017/200/664/original/colorful-glowing-music-equalizer-animation-on-black-background-audio-spectrum-music-background-loop-animation-of-equalizer-multicolored-sound-equalizer-animation-nightclub-and-disco-background-free-video.jpg') !important;   background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;height: 100% !important;">
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

</body>

</html>
