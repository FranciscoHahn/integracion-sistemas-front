@extends('layout.internolayout')
@section('content')
    <div class="row">
        <div class="d-block p-2">
            <h3 class="text-white">Administración de usuarios internos</h3>
            <a type="button" class="btn btn-outline-primary" href="{{ route('registrarusuario') }}">Crear nuevo
                usuario</a>
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
                    Dirección
                </th>
                <th>
                    Perfil
                </th>
                <th>
                    Rut
                </th>
                <th>
                    Opciones
                </th>

            </thead>
            <tbody class="text-white">
                @foreach ($usuarios as $usuario)
                    @if ($usuario->id != Session::get('data_usuario')->id)
                        <tr>
                            <td>
                                {{ $usuario->id }}
                            </td>
                            <td>
                                {{ $usuario->nombres }}
                            </td>
                            <td>
                                {{ $usuario->apellidos }}
                            </td>
                            <td>
                                {{ $usuario->email }}
                            </td>
                            <td>
                                {{ $usuario->direccion }}
                            </td>
                            <td>
                                {{ $usuario->perfil_nombre }}
                            </td>
                            <td>
                                {{ $usuario->rut }}
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Vertical button group">
                                    <a type="button" class="btn btn-outline-success"
                                        href="{{ route('modificarusuario', ['id' => $usuario->id]) }}">Modificar</a>
                                    @if ($usuario->activo)
                                        <a type="button" class="btn btn-outline-success"
                                            href="{{ route('desactivarusuario', ['id' => $usuario->id]) }}">Desactivar</a>
                                    @else
                                        <a type="button" class="btn btn-outline-success"
                                            href="{{ route('activarusuario', ['id' => $usuario->id]) }}">Activar</a>
                                    @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
