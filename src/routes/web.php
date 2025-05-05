<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [DictionaryController::class, 'index'])
->middleware(['auth'])
->name('home');  //検索画面
Route::post('dictionary/register', [DictionaryController::class, 'store'])->name('dictionary.store'); //登録処理
Route::get('/dictionary/register', [DictionaryController::class, 'showRegisterForm'])->name('dictionary.register'); //登録画面表示
Route::get('/', function () {
    return redirect()->route('login');
});//ログイン画面表示
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // ログアウト後の遷移先
})->name('logout');