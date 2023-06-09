@extends('layout.internolayout')
@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-9">
            <div class="d-block p-2">
                <h3>Crear usuario</h3>
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

            <form class="col-12" method="POST" action="{{ route('registrandousuario') }}">
                @csrf
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="nombres" class="form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Nombre</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="apellidos" class="form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Apellido</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="rut" class="form-control"
                            style="color: white;" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Rut</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" name="email" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Email</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" name="nombreusuario" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Nomde de
                            usuario</label>
                    </div>
                </div>


                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" name="direccion" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Dirección</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" name="password1" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example4c">Contraseña</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" name="password2" class="form-control" />
                        <label class="form-label" style="color: white;" for="form3Example4cd">Repita su
                            contraseña</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <select class="form-select bg-dark text-white" name="perfil_id" aria-label="Default select example">
                            @foreach ($perfiles as $perfil)
                                <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-outline-success btn-outline-change">Crear
                        cuenta</button>
                </div>
                @csrf



            </form>


        </div>
    </div>
@endsection
