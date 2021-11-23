<?php

use DebugBar\DataCollector\MessagesCollector;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

// 掲示板トップを表示
Route::get('/', [MessageController::class,'showBoard'])->name('showBoard');

// メッセージ投稿処理
Route::post('/addboard', [MessageController::class,'addBoard'])->name('addBoard');

// ログイン画面表示
Route::get('/login',[MessageController::class,'showLogin'])->name('showLogin');

// ログインチェック
Route::post('/logincheck',[MessageController::class,'loginCheck'])->name('loginCheck');

//  ログアウト
Route::get('/logout',[MessageController::class,'logout'])->name('logout')->middleware('LoginSession');

// 管理者ページトップを表示(admin)
Route::get('/admin',[MessageController::class,'showAdmin'])->name('showAdmin')->middleware('LoginSession');

// 編集ページを表示(admin)
Route::get('/admin/edit/{id}',[MessageController::class,'showEdit'])->name('showEdit')->middleware('LoginSession');

// 編集実行(admin)
Route::post('/admin/editdone',[MessageController::class,'editDone'])->name('editDone')->middleware('LoginSession');

// 削除ページを表示(admin)
Route::get('/admin/delete/{id}',[MessageController::class,'showDelete'])->name('showDelete')->middleware('LoginSession');

// 削除実行(admin)
Route::post('/admin/deletedone',[MessageController::class,'deleteDone'])->name('deleteDone')->middleware('LoginSession');