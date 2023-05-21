<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get( '/', function () {
    return view('welcome');
}); */

Route::get( '/hello_world', fn () => view('hello_world'));
Route::get( '/hello', fn () => view('hello', [
    'name' => "山田",
    'course' => "Laravel9"
]));

Route::get( '/', fn () => view('index'));
