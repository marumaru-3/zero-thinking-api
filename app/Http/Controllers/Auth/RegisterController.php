<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(UserRegisterRequest $request)
    {
        // バリデーション済みデータ取得
        $validated = $request->validated();

        // パスワードをハッシュ化してユーザー作成
        $user = User::create([
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // トークンを発行
        $token = $user->createToken('access_token')->plainTextToken;

        // レスポンス返却（トークン付き）
        return response()->json([
            'message' => 'ユーザー登録に成功しました！',
            'token' => $token,
            'user' => $user,
        ], 201);
    }
}
