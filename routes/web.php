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


Route::get('transbank-init', 'App\Http\Controllers\Transbank@init')->name('transbank-init');
Route::get('transbank-retorno', 'App\Http\Controllers\Transbank@returnFromTransbank')->name('transbank-retorno');
Route::get('mis-compras', 'App\Http\Controllers\Bienvenida@misCompras');
Route::get('logout', function(){
    Session::flush();
    Session::regenerate();
    $mensaje_registro = "Sesión finalizada";
    return view('pages.login', compact('mensaje_registro'));
});

Route::get('interno', function(){
    return view('pages.logininterno');
});

Route::post('interno-login', 'App\Http\Controllers\Interno@login');
//logoutinterno
Route::get('logoutinterno', function(){
    Session::flush();
    Session::regenerate();
    $mensaje_registro = "Sesión finalizada";
    return view('pages.logininterno', compact('mensaje_registro'));
})->name('logoutinterno');

Route::get('interno-ini', 'App\Http\Controllers\Interno@welcomeinterno')->name('interno-ini');
Route::get('admin-users', 'App\Http\Controllers\Interno@adminUsuarios')->name('usuarios');
Route::get('admin-instrumentos', 'App\Http\Controllers\Interno@adminProductos')->name('admin-instrumentos');
Route::get('admin-clientes', 'App\Http\Controllers\Interno@adminClientes')->name('admin-clientes');
//crearusuario
Route::get('registrarusuario', 'App\Http\Controllers\Usuarios@registrarusuario')->name('registrarusuario');
//registrandousuario
Route::post('registrandousuario', 'App\Http\Controllers\Usuarios@registrandousuario')->name('registrandousuario');
Route::get('modificarusuario/{id}', 'App\Http\Controllers\Usuarios@modificarusuario')->name('modificarusuario');
Route::post('modificandousuario', 'App\Http\Controllers\Usuarios@modificandousuario')->name('modificandousuario');
Route::get('activarusuario/{id}', 'App\Http\Controllers\Usuarios@activarusuario')->name('activarusuario');
Route::get('desactivarusuario/{id}', 'App\Http\Controllers\Usuarios@desactivarusuario')->name('desactivarusuario');
Route::get('crearproducto', 'App\Http\Controllers\Productos@crearproducto')->name('crearproducto');
Route::post('creandoproducto','App\Http\Controllers\Productos@creandoproducto')->name('creandoproducto');

Route::get('modificarproducto/{id}','App\Http\Controllers\Productos@modificarproducto')->name('modificarproducto');
Route::get('activarproducto/{id}','App\Http\Controllers\Productos@activarproducto')->name('activarproducto');
Route::get('desactivarproducto/{id}','App\Http\Controllers\Productos@desactivarproducto')->name('desactivarproducto');
Route::post('modificandoproducto', 'App\Http\Controllers\Productos@modificandoproducto')->name('modificandoproducto');
Route::get('entregas', 'App\Http\Controllers\Entregas@entregas')->name('entregas');
Route::get('detalleventas/{id}', 'App\Http\Controllers\Entregas@detalleventas')->name('detalleventas');
Route::post('cambiarestadoentrega', 'App\Http\Controllers\Entregas@cambiarestadoentrega')->name('cambiarestadoentrega'); 






