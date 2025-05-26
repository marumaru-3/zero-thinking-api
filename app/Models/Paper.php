<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    // 一括保存を許可するカラム
    protected $fillable = [
        'user_id',
        'title',
        'body_list',
        'date'
    ];

    // 型変換
    protected $casts = [
        'body_list' => 'array',
        'date' => 'date'
    ];

    // 紐づいたユーザーを取得
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
