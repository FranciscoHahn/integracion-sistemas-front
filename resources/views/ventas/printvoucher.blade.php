<!DOCTYPE html>
<html>

<head>
    <title>Voucher de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h1>Voucher de Compra</h1>
    <hr/>
    <h2>Información de la Compra</h2>
    <table>
        <tr>
            <th>Venta #</th>
            <th>Fecha</th>
            <th>Forma de pago</th>
            @if($data_venta->nombre_cliente <> 'anon')
            <th>Cliente</th>
            @endif
        </tr>
        <tr>
            <td># {{ $data_venta->id }}</td>
            <td>{{ $data_venta->fecha }}</td>
            <td>{{ $data_venta->forma_de_pago }}</td>
            @if($data_venta->nombre_cliente <> 'anon')
            <th>{{$data_venta->nombre_cliente." ".$data_venta->apellido_cliente}}</th>
            @endif
        </tr>
    </table>
    <hr/>
    <h2>Instrumento</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        @foreach ($venta as $instrumento)
            <tr>
                <td>{{ $instrumento->nombre_producto }}</td>
                <td>{{ $instrumento->nombre_categoria }}</td>
                <td style="word-wrap: nowrap;">$&nbsp;{{ intval($instrumento->precio_unitario) }}</td>
                <td>{{ $instrumento->cantidad }}</td>
                <td style="word-wrap: nowrap;">$&nbsp;{{ intval($instrumento->subtotal) }}</td>
            </tr>
        @endforeach
    </table>
<hr/>
    <h2>Total</h2>

            <h4 style="word-wrap: nowrap;">$&nbsp;{{ intval($total) }}</h4>

</body>

</html>