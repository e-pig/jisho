<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;

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

Route::get('/home', [DictionaryController::class, 'index'])->name('home');  //検索画面
Route::post('/register', [DictionaryController::class, 'store'])->name('dictionary.store'); //登録処理
Route::get('/register', [DictionaryController::class, 'showRegisterForm'])->name('dictionary.register'); //登録画面表示
Route::get('/', [DictionaryController::class, 'showLoginForm'])->name('login.form'); //ログイン画面表示
Route::post('/login', [DictionaryController::class, 'login'])->name('login'); //ログイン処理