<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\Auth\RegisterController;

// メモ一覧取得
Route::get('/papers', [PaperController::class, 'index']);
// メモ登録
Route::post('/papers', [PaperController::class, 'store']);
// メモ削除
Route::delete('/papers/{id}', [PaperController::class, 'destroy']);

// ユーザー登録
Route::post('/register', RegisterController::class);
