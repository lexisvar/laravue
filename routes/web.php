<?php

Route::get('/', function () {
    return view('clientes');
});

Route::get('inicio', 'AdminController@index');
Route::get('clientes', 'AdminController@clientes');
Route::get('cliente/{cliente_id}', 'AdminController@show');
Route::delete('clientes/{cliente_id}', 'AdminController@eliminar');
Route::post('cliente', 'AdminController@save');
Route::post('cliente/{cliente_id}', 'AdminController@actualizar');
Route::get('departamentos/{pais_id}', 'AdminController@departamentos');
Route::get('ciudades/{departamento_id}', 'AdminController@ciudades');
Route::get('ciudad/{ciudad_id}', 'AdminController@getCiudad');

