<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaperStoreRequest;
use App\Models\Paper;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * メモ登録処理
     */
    public function store(PaperStoreRequest $request)
    {
        $validated = $request->validated();
        // 後で変更
        $validated['user_id'] = 1;
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
