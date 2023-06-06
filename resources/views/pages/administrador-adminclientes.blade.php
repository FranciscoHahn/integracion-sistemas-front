@extends('layout.internolayout')
@section('content')
<style>
    th, td {
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
            <a class="navbar-brand mt-2 mt-lg-0" href="#" style="color: #91ffff;">
                <i class="fas fa-guitar" style="color: #91ffff;"></i>&nbsp;&nbsp;Music Pro | <small class="text-muted">&nbsp;Panel de {{Session::get("perfil")}} </small>
            </a>

            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <a class="link-secondary me-3" title="Administración de usuarios" href="././admin-users">
                <i class="fa-sharp fa-solid fa-users" style="color: #white;"></i>
            </a>
            <a class="link-secondary me-3" title="Entregas" href="#">
                <i class="fas fa-truck" style="color: #white;"></i>
            </a>
            <a class="link-secondary me-3" title="Productos" href="././admin-instrumentos">
                <i class="fas fa-guitar" style="color: #white;"></i>
            </a>
            <a class="link-secondary me-3" title="Clientes" href="././admin-clientes">
                <i class="fas fa-user neon-active" style="color: #white;"></i>
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
            <div class="">
                <div class="d-block p-2"> 
                    <h3>Administración de clientes</h3>
                </div>
                <table class="table table-bordered border-primary text-white">
                    <thead>
                    <th>
                        id
                    </th>
                    <th>
                        Nombres
                    </th>
                    <th>
                        Apellidos
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Teléfono
                    </th>
                    <th>
                        Opciones
                    </th>

                    </thead>
                    <tbody>
                        @foreach($clientes as $usuario)
                        <tr>
                            <td>
                                {{$usuario->id}}
                            </td>
                            <td>
                                {{$usuario->nombre}}
                            </td>
                            <td>
                                {{$usuario->apellido}}
                            </td>
                            <td>
                                {{$usuario->email}}
                            </td>
                            <td>
                                {{$usuario->telefono}}

                            </td>
                            <td>
                                @if($usuario->activo)
                                <a type="button" class="btn btn-outline-success" href="././desactivar-cliente?id={{$usuario->id}}">Desactivar</a>
                                @else
                                <a type="button" class="btn btn-outline-success" href="././activar-cliente?id={{$usuario->id}}">Activar</a>
                                @endif


                            </td>

                        </tr>
                        @endforeach 
                    </tbody>
                </table>

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
