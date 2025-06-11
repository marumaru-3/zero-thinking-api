<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        // ユーザーに紐づくメモを削除
        $user->papers()->delete();
        // トークンを削除
        $user->currentAccessToken()->delete();
        // ユーザーをを削除
        $user->delete();

        // レスポンス返却
        return response()->json([
            'message' => 'アカウントを削除しました',
        ]);
    }
}
