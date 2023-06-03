@extends('layout.mainlayout')
@section('content')

<form name="brouterForm" id="brouterForm"  method="POST" action="{{$respuesta->url}}" style="display:block;">
    <input type="hidden" name="token_ws" value="{{$respuesta->token}}" />
    <input type="submit" class="btn btn-primary" value="Continuar con el pago" style="" />
</form>


@endsection



