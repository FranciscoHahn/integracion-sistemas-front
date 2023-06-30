@extends('layout.internolayout')
@section('content')
    <div class="">
        <div class="d-block p-2">
            <h3 class="text-white">Administración de productos</h3>
            @if (Session::get('perfil') == 'Administrador') 
                <a type="button" class="btn btn-outline-primary" href="{{ route('crearproducto') }}">Crear nuevo producto</a>
            @endif
        </div>
        <table class="table table-bordered table-sm" style="width: 100%;">
            <thead class="text-white">
                <th>
                    id
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Marca
                </th>
                <th>
                    Categoría
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Activo
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Stock
                </th>
                <th>
                    Opciones
                </th>

            </thead>
            <tbody class="text-white">
                @foreach ($instrumentos as $instrumento)
                    <tr>

                        <td>
                            {{ $instrumento->id }}
                        </td>
                        <td>
                            {{ $instrumento->nombre }}
                        </td>
                        <td>
                            {{ $instrumento->marca }}
                        </td>
                        <td>
                            {{ $instrumento->nombre_categoria }}
                        </td>
                        <td>
                            {{ $instrumento->descripcion }}
                        </td>
                        <td>
                            {{ $instrumento->activo_instrumento }}
                        </td>
                        <td>
                            {{ intval($instrumento->precio) }}
                        </td>
                        <td>
                            {{ $instrumento->stock }}
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Vertical button group">
                                @if (Session::get('perfil') == 'Administrador')
                                    <a type="button" class="btn btn-outline-success"
                                        href="{{ route('modificarproducto', ['id' => $instrumento->id]) }}">Modificar</a>

                                    @if ($instrumento->activo)
                                        <a type="button" class="btn btn-outline-success"
                                            href="{{ route('desactivarproducto', ['id' => $instrumento->id]) }}">Desactivar</a>
                                    @else
                                        <a type="button" class="btn btn-outline-success"
                                            href="{{ route('activarproducto', ['id' => $instrumento->id]) }}">Activar</a>
                                    @endif
                                @else
                                    <span class="badge badge-primary text-muted"> Sin acciones disponibles</span>
                                @endif
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
