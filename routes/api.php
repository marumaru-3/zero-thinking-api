<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DeleteAccountController;
use Illuminate\Http\Request;

// 認証系ルート
Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::middleware('auth:sanctum')->post('/logout', LogoutController::class);

// 認証済みユーザー情報取得
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});
// 認証済みユーザー削除
Route::middleware('auth:sanctum')->delete('/user', DeleteAccountController::class);

// 業務機能（メモ関連）
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/papers', [PaperController::class, 'index']);
    Route::post('/papers', [PaperController::class, 'store']);
    Route::delete('/papers/{id}', [PaperController::class, 'destroy']);
});
