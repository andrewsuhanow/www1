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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [
    'as'=>'main',
    'uses'=>'Controller@main'
]);


Route::post('/reg', [
    'as'=>'reg',
    'uses'=>'Controller@reg'
]);

Route::post('/unReg', [
    'as'=>'unReg',
    'uses'=>'Controller@unReg'
]);
