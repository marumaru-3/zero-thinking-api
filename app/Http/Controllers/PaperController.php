<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaperStoreRequest;
use App\Models\Paper;
use App\Http\Resources\PaperResource;

class PaperController extends Controller
{
    /**
     * メモ一覧取得
     */
    public function index(Request $request)
    {
        $papers = Paper::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return PaperResource::collection($papers);
    }

    /**
     * メモ登録処理
     */
    public function store(PaperStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $paper = Paper::create($validated);

        return response()->json([
            'message' => 'メモを保存しました！',
            'data' => $paper,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * メモ削除機能
     */
    public function destroy(Request $request, string $id)
    {
        $paper = Paper::where('user_id', $request->user()->id)->findOrFail($id);
        $paper->delete();

        return response()->json([
            'message' => 'メモを削除しました'
        ]);
    }
}
