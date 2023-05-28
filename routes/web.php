<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RuqestController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;

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
Route::get( '/curriculum', fn () => view('curriculum'));

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'wolrdTime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);

//リクエスト
Route::get('/form', [RuqestController::class, 'form']);
Route::get('/query-strings', [RuqestController::class, 'queryStrings']);
Route::get('/users/{id}', [RuqestController::class, 'profile'])->name(name: 'profile');
Route::get('/products/{category}/{year}', [RuqestController::class, 'profileArchive']);
Route::get('/route-link', [RuqestController::class, 'routeLink']);

//ログイン機能
Route::get('/login', [RuqestController::class, 'loginForm']);
Route::post('/login', [RuqestController::class, 'login'])->name(name: 'login');

//イベント
Route::resource('/events', EventController::class)->only(['create', 'store']);

// ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

// ファイル管理
Route::resource('/photos', PhotoController::class)->only(['create', 'store', 'show', 'destroy']);
Route::get('/photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');