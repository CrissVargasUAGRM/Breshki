<?php 
//rutas no protegidas

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*login*/
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@userRegister');
Route::post('logout', 'AuthController@cerrarSesion');

/*categoria*/
Route::get('categoria', 'CategoriaController@index');

/* Productos */
Route::get('producto', 'ProductoController@index'); 
Route::get('productoCat', 'ProductoController@getProductCategory');
Route::get('searchProd', 'ProductoController@searchProduct');

/* Carrito */
Route::post('addCart', 'CarritoController@addCart');
Route::get('getCart', 'CarritoController@getCart');
Route::delete('deleteProdCart/{id}', 'CarritoController@deleteProdCart');


