@extends('layout.internolayout')
@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-9">
            <div class="d-block p-2 text-white">
                <h3>Crear producto</h3>
            </div>
            @if (isset($mensaje))
                <div class="justify-content-evenly rounded mb-2" style="background-color:red">
                    <p>{{ $mensaje }}</p>
                </div>
                @if ($errores)
                    <ul>
                        @foreach ($errores as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            @endif

            <form class="col-12" method="POST" action="{{route('modificandoproducto')}}">
                @csrf
                <input type="hidden" name="instrumento_id" value="{{$instrumento->id}}">
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="nombre" class="text-white form-control"
                            style="color: white;" value="{{$instrumento->nombre}}" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Nombre</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="marca" value="{{$instrumento->marca}}" class="text-white form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Marca</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="descripcion" value="{{$instrumento->descripcion}}" class="text-white form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Descripción</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="number" id="form3Example3c" name="precio" value="{{intval($instrumento->precio)}}" class="text-white form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">precio</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="number" id="form3Example3c" name="stock" value="{{$instrumento->stock}}" class="text-white form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Stock</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" name="imagen" value="{{$instrumento->imagen}}" class="text-white form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Link imagen</label>
                    </div>
                </div>
                
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <select class="form-select bg-dark text-white" name="categoria_id" aria-label="Default select example">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{$categoria->id == $instrumento->categoria_id ? 'selected': ''}}>{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-outline-success btn-outline-change">Modificar
                        Instrumento</button>
                </div>
                @csrf



            </form>


        </div>
    </div>
@endsection
