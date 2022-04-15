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
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::group([], function(){
    Route::get('/proyectos','ProyectoController@index')->name('proyectos.index');
    Route::get('/proyectos/nuevo','ProyectoController@create')->name('proyectos.create');
    Route::post('/proyectos/nuevo','ProyectoController@store')->name('proyectos.store');
    Route::get('/proyectos/downloadPdf','ProyectoController@downloadPdf')->name('proyectos.downloadPdf');
    

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
