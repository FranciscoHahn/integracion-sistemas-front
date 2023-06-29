@extends('layout.internolayout')
@section('content')
    <div class="text-white d-flex justify-content-center">
        <div class="">
            <div class="d-block p-2">
                <h3>Pedidos</h3>
            </div>
            <table class="table table-bordered table-sm" style="width: 100%;">
                <thead class="text-white">
                    <tr>
                        <th>Fecha</th>
                        <td>Cliente</td>
                        <th>Estado de Pago</th>
                        <th>Estado de Entrega</th>
                        <th>Forma de Retiro</th>
                        <th>Dirección de Despacho</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-white">
                    @foreach ($ventas as $venta)
                        @if ($venta->estado_pago == 'Pagada')
                            <tr>
                                <td>{{ $venta->fecha }}</td>
                                <td>{{ $venta->nom_cliente . ' ' . $venta->ap_cliente }}</td>
                                <td>{{ $venta->estado_pago }}</td>
                                <td>{{ $venta->estado_entrega }}</td>
                                <td>{{ $venta->forma_retiro }}</td>
                                <td>{{ $venta->direccion_despacho }}</td>

                                <td><a href="{{ route('detalleventas', ['id' => $venta->id]) }}"
                                        class="btn btn-outline-primary">Ver detalle</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
@endsection
