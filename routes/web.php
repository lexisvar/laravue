<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio', 'AdminController@index');
Route::get('clientes', 'AdminController@clientes');
Route::post('clientes', 'AdminController@actualizar');
Route::get('departamentos/{pais_id}', 'AdminController@departamentos');
Route::get('ciudades/{departamento_id}', 'AdminController@ciudades');

