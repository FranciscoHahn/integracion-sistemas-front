@extends('layout.internolayout')
@section('content')
    <div class="text-white">
        <div class="">
            <div class="d-block p-2 text-white">
                <h3>Detalle venta</h3>
                <h6>Dirección: {{ $data_venta->direccion_despacho }}</h6>
                <h6>Forma de retiro: {{ $data_venta->forma_retiro }}</h6>
                <h6>Cliente: {{ $data_venta->nombre_cliente . ' ' . $data_venta->apellido_cliente }}</h6>
                <div class="form-outline flex-fill mb-0">
                    <form method="POST" action="{{ route('cambiarestadoentrega') }}">
                        @csrf
                        <div class="input-group">
                            <input type="hidden" name="id_venta" value="{{ $data_venta->id }}" />
                            <button type="submit" class="btn btn-outline-primary">Confirmar cambio de estado</button>
                            <select class="form-select bg-dark text-white" name="estado_entrega"
                                aria-label="Default select example">
                                @foreach ($estados as $estado)
                                    @if ($data_venta->forma_retiro == 'A domicilio' && !in_array($estado, ['Preparada para retiro']))
                                        <option value="{{ $estado }}"
                                            {{ $estado == $data_venta->estado_entrega ? 'selected' : '' }}>
                                            {{ $estado }}
                                        </option>
                                    @elseif($data_venta->forma_retiro != 'A domicilio' && !in_array($estado, ['Preparada para despacho', 'Despachando']))
                                        <option value="{{ $estado }}"
                                            {{ $estado == $data_venta->estado_entrega ? 'selected' : '' }}>
                                            {{ $estado }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <hr />

            <div class="row">
                @foreach ($venta as $instrumento)
                    <div class="col-3">

                        <div class="card" style="background-color: #212121; color: #b3b3b3; border: 2px solid #b3b3b3;">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $instrumento->imagen }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $instrumento->nombre_producto }}
                                        ({{ $instrumento->cantidad }})
                                    </h5>
                                    <h6 class="fw-bolder">{{ $instrumento->nombre_categoria }}</h6>
                                    <!-- Product price-->
                                    {{ "$ " . number_format($instrumento->precio_unitario, 0, ',', '.') }}
                                    <hr />
                                    Subtotal: {{ "$ " . number_format($instrumento->subtotal, 0, ',', '.') }}
                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach


            </div>

        </div>
    @endsection
