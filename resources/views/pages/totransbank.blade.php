@extends('layout.mainlayout')
@section('content')

<form name="brouterForm" class="d-none" id="form_transbank"  method="POST" action="{{$respuesta->url}}" style="display:block;">
    <input type="hidden" name="token_ws" value="{{$respuesta->token}}" />
    <input type="submit" class="btn btn-primary" value="Continuar con el pago" style="" />
</form>

<script>
    $(document).ready(function (){
        $("#form_transbank").submit();
    });
</script>


@endsection



