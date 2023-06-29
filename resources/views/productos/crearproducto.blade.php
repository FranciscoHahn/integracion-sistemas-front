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

            <form class="col-12" method="POST" action="{{route('creandoproducto')}}">
                @csrf
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="nombre" class="form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Nombre</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="marca" class="form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Marca</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="descripcion" class="form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Descripción</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="number" id="form3Example3c" name="precio" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">precio</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="number" id="form3Example3c" name="stock" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Stock</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" name="imagen" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Link imagen</label>
                    </div>
                </div>
                
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <select class="form-select bg-dark text-white" name="categoria_id" aria-label="Default select example">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-outline-success btn-outline-change">Crear
                        Instrumento</button>
                </div>
                @csrf



            </form>


        </div>
    </div>
@endsection
