<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->group(function () {
    // メモ一覧取得
    Route::get('/papers', [PaperController::class, 'index']);
    // メモ登録
    Route::post('/papers', [PaperController::class, 'store']);
    // メモ削除
    Route::delete('/papers/{id}', [PaperController::class, 'destroy']);

    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});

// ユーザー登録
Route::post('/register', RegisterController::class);
// ログイン処理
Route::post('/login', LoginController::class);
// ログアウト機能
Route::middleware('auth:sanctum')->post('/logout', LogoutController::class);
