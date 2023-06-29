@extends('layout.internolayout')
@section('content')
    <style>
        th,
        td {
            padding: 15px;
        }
    </style>






    <div class="text-white d-flex justify-content-center">


        <div class="">
            <div class="d-block p-2">
                <h3>Opciones de {{ Session::get('perfil') }}</h3>
                <h6>Descripción de íconos de la barra superior</h6>
            </div>
            <div class="p-2" style="font-size: 25px;">
                <ul style="list-style-type: none;" >
                    <li>
                        <i class="fa-sharp fa-solid fa-users solo-neon-icon-cyan"></i>
                        Administración de usuarios
                    </li>
                    <li>
                        <i class="fas fa-truck solo-neon-icon-cyan" style="color: white;"></i>
                        Control de entregas
                    </li>
                    <li>
                        <i class="fas fa-guitar solo-neon-icon-cyan" style="color: white;"></i>
                        Mantenedor de productos
                    </li>
                    <li>
                        <i class="fas fa-user solo-neon-icon-cyan" style="color: white;"></i>
                        Administración de clientes
                    </li>
                    <li>
                        <i class="fas fa-list solo-neon-icon-cyan" style="color: white;"></i>
                        Reportes
                    </li>
                    <li>
                        <i class="fa fa-sign-out solo-neon-icon-red" aria-hidden="true" style="color: white;"></i>
                        &nbsp;&nbsp;&nbsp;Salir del sistema
                    </li>
                </ul>
                
            </div>
        </div>

    </div>
@endsection
