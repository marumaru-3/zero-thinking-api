<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('api')->group(function () {
    // メモ一覧取得
    Route::get('/papers', [PaperController::class, 'index']);
    // メモ登録
    Route::post('/papers', [PaperController::class, 'store']);
    // メモ削除
    Route::delete('/papers/{id}', [PaperController::class, 'destroy']);
});
