<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
/**
  Route::get('/', function () {
  return view('pages.login');
  });
 */
Route::get('/', function() {
    if (Session::get("token") == null) {
        return view('pages.login');
    } else {
        return redirect('/catalogo');
    }
});


Route::get('users', 'App\Http\Controllers\Bienvenida@test');
Route::post('login', 'App\Http\Controllers\Bienvenida@login');
Route::get('catalogo', 'App\Http\Controllers\Bienvenida@catalogo');
//formRegistro
Route::get('registro', 'App\Http\Controllers\Bienvenida@formRegistro');
Route::post('registro-process', 'App\Http\Controllers\Bienvenida@processRegistro');
Route::post('articulo-carrito', 'App\Http\Controllers\Bienvenida@agregarArticuloAVenta');
Route::get('resumen-compra', 'App\Http\Controllers\Bienvenida@resumenCompra');
Route::post('comprar-process', 'App\Http\Controllers\Bienvenida@comprarProcess');


Route::get('transbank-init', 'App\Http\Controllers\Transbank@init');
Route::get('transbank-retorno', 'App\Http\Controllers\Transbank@returnFromTransbank');
Route::get('mis-compras', 'App\Http\Controllers\Bienvenida@misCompras');
Route::get('logout', function(){
    Session::flush();
    Session::regenerate();
    $mensaje_registro = "Sesión finalizada";
    return view('pages.login', compact('mensaje_registro'));
});

