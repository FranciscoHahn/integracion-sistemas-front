@extends('layout.internolayout')
@section('content')

    <div class="d-flex justify-content-center text-white">
        <div class="col-9">
            <div class="d-block p-2 text-white">
                <h3>Crear usuario</h3>
            </div>
            @if (isset($mensaje))
                <div class="justify-content-evenly rounded mb-2" style="background-color:red">
                    <p>{{ $mensaje }}</p>
                </div>
                @if ($errores)
                    <ul>
                        @foreach ($errores as $error)
                            @if ($error->error)
                                <li>{{ $error->msg }}</li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            @endif

            <form class="col-12 text-white" method="POST" action="{{ route('modificandousuario') }}">
                @csrf
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="nombres" class="form-control text-white" style="color: white;"
                            value="{{ $user->nombres }}" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Nombre</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="apellidos" class="form-control text-white"
                            style="color: white;" value="{{ $user->apellidos }}" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Apellido</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="rut" class="form-control text-white" style="color: white;"
                            value="{{ $user->rut }}" />
                        <label class="form-label" style="color: white;" for="form3Example1c">Rut</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" name="email" class="form-control text-white"
                            value="{{ $user->email }}" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Email</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" value="{{ $user->nombreusuario }}" name="nombreusuario"
                            class="form-control text-white" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Nomde de
                            usuario</label>
                    </div>
                </div>


                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" name="direccion" value="{{ $user->direccion }}"
                            class="form-control text-white" />
                        <label class="form-label" style="color: white;" for="form3Example3c">Dirección</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" value="{{ $user->password }}" name="password1"
                            class="form-control text-white" />
                        <label class="form-label" style="color: white;" for="form3Example4c">Contraseña</label>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" value="{{ $user->password }}" name="password2"
                            class="form-control text-white" />
                        <label class="form-label" style="color: white;" for="form3Example4cd">Repita su
                            contraseña</label>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <select class="form-select bg-dark text-white" name="id_perfil" aria-label="Default select example">
                            @foreach ($perfiles as $perfil)
                                <option {{ $user->id_perfil == $perfil->id ? 'selected' : '' }}
                                    value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id_usuario" value="{{ $user->id }}">

                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-outline-success btn-outline-change">Modificar
                        cuenta</button>
                </div>
                @csrf



            </form>


        </div>
    </div>
@endsection
