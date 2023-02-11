<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート
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

//httpリクエストのメゾットを定義。、今回はgetメソッド
Route::get('/posts', [PostController::class, 'index']);   //PostControllerのibdexというメゾットを実行
Route::get('/',[PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);  //ブログ投稿
Route::post('/posts', [PostController::class, 'store']);         //投稿作成
Route::get('/posts/{post}', [PostController::class ,'show']);    //ブログの投稿詳細画面
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);