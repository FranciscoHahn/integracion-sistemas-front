@extends('layout.internolayout')
@section('content')
<style>


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
                <i class="fas fa-guitar" style="color: #1db954;"></i>&nbsp;&nbsp;Music Pro | <small class="text-muted">&nbsp;Panel interno</small>
            </a>

            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <a class="link-secondary me-3" title="Administración de usuarios" href="#">
                <i class="fa-sharp fa-solid fa-users neon-active"></i>
            </a>
            <a class="link-secondary me-3" title="Entregas" href="#">
                <i class="fas fa-truck" style="color: #white;"></i>
            </a>
            <a class="link-secondary me-3" title="Productos" href="#">
                <i class="fas fa-guitar" style="color: #white;"></i>
            </a>
            <a class="link-secondary me-3" title="Clientes" href="#">
                <i class="fas fa-user" style="color: #white;"></i>
            </a>
            <a class="link-secondary me-3" title="Reportes" href="#">
                <i class="fas fa-list" style="color: #white;"></i>
            </a>


            <!-- Icon -->
            <a class="link-secondary me-3" id="link-compra" href="#">
                <i class="fas fa-shopping-cart carrito-comprar" aria-hidden="true" style=""></i>
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
    <div class="container px-4 px-lg-5 my-5 text-white">
        <p>Panel de {{Session::get("perfil")}} </p>

        <dl>
            <dt><i class="fa-sharp fa-solid fa-users neon-active"></i> Administración de usuarios</dt>
            <dd>A large feline inhabiting Bodmin Moor.</dd>

            <dt>Morgawr</dt>
            <dd>A sea serpent.</dd>

            <dt>Owlman</dt>
            <dd>A giant owl-like creature.</dd>
        </dl>



        <div class="text-white">
            <h3 class="fw-bolder">
                Panel de {{Session::get("perfil")}} 
            </h3>
            <div class="d-flex justify-content-center">
                <table>
                    <tr>
                        <td>
                            <a class="link-secondary me-3" title="Administración de usuarios" href="#">
                                <i class="fa-sharp fa-solid fa-users neon-active"></i>
                            </a></td>
                        <td>Administración de usuario</td>
                        <td>Mantención de datos de usuario</td>
                    </tr>
                    <tr>
                        <td>
                            <a class="link-secondary me-3" title="Entregas" href="#">
                                <i class="fas fa-truck neon-active" style="color: #white;"></i>
                            </a>
                        </td>
                        <td>Entregas</td>
                        <td>Control de entregas</td>



                    </tr>
                    <tr>  
                        <td>
                            <a class="link-secondary me-3" title="Productos" href="#">
                                <i class="fas fa-guitar neon-active" style="color: #white;"></i>
                            </a>
                        </td>
                        <td>Mantenedor de productos</td>
                        <td>Mantención de datos de productos disponibles en catálogo</td>

                    </tr>
                    <tr>
                        <td>
                            <a class="link-secondary me-3" title="Clientes" href="#">
                                <i class="fas fa-user neon-active" style="color: #white;"></i>
                            </a>
                        </td>
                        <td>Administración de clientes</td>
                        <td>Administración de datos de clientes</td>



                    </tr>
                    <tr>
                        <td>
                            <a class="link-secondary me-3" title="Reportes" href="#">
                                <i class="fas fa-list neon-active" style="color: #white;"></i>
                            </a>
                        </td>
                        <td>Reportes</td>
                        <td>Acceso a reportes del sistema</td>

                    </tr>
                    <tr>
                        <td>
                            <a class="link-secondary me-3" href="././logoutinterno" title="Salir">
                                <i class="fa fa-sign-out neon-active-red" aria-hidden="true" style="color:white">
                                </i>
                            </a>
                        </td>
                        <td>Salir del sistema</td>
                    <tr>
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
