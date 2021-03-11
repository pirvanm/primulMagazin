<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/prima', function () {
    return 'prima ruta';
});


Route::get('/d', function () {
    return 'prima ruta';
});

Route::get(
    '/data',
    'PrimulMeuController@getData'
);


Route::get(
    '/rutaController',
    'PrimulMeuController@index'
);

// Route::get(
//     '/preiaUtilizator',
//     'PrimulMeuController@getUser'
// );


// Route::get(
//     '/html2',
//     'PrimulMeuController@getHTML'
// );
