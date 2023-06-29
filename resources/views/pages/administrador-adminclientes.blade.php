@extends('layout.internolayout')
@section('content')
    <div class="">
        <div class="d-block p-2 text-white">
            <h3>Administración de clientes</h3>
        </div>
        <table class="table table-bordered table-sm" style="width: 100%;">
            <thead class="text-white">
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
            <tbody class="text-white">
                @foreach ($clientes as $usuario)
                    <tr>
                        <td>
                            {{ $usuario->id }}
                        </td>
                        <td>
                            {{ $usuario->nombre }}
                        </td>
                        <td>
                            {{ $usuario->apellido }}
                        </td>
                        <td>
                            {{ $usuario->email }}
                        </td>
                        <td>
                            {{ $usuario->telefono }}

                        </td>
                        <td>
                            @if ($usuario->activo)
                                <a type="button" class="btn btn-outline-primary"
                                    href="././desactivar-cliente?id={{ $usuario->id }}">Desactivar</a>
                            @else
                                <a type="button" class="btn btn-outline-primary"
                                    href="././activar-cliente?id={{ $usuario->id }}">Activar</a>
                            @endif


                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
