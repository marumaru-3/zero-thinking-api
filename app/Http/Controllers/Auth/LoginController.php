<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     */
    public function __invoke(LoginRequest $request)
    {
        // バリデーション済みのデータ取得
        $credentials = $request->only('email', 'password');

        // 該当ユーザーをDBから探す（emailで）
        $user = User::where('email', $credentials['email'])->first();

        // ユーザーが存在しない or パスワードが間違っていたらエラー
        if (!$user) {
            return response()->json(['message' => 'メールアドレスが正しくありません'], 401);
        } elseif (!Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'パスワードが間違っています'], 401);
        }

        // トークンを発行
        $token = $user->createToken('login-token')->plainTextToken;

        // レスポンス返却
        return response()->json([
            'message' => 'ログインに成功しました',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
