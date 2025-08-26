<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * スライド一覧を表示する
     */
    public function admin()
    {
        // orderでソートして全スライドを取得
        $slides = Slide::orderBy('order')->get();

        return view('slides.admin', compact('slides'));
    }

    /**
     * スライド作成フォームを表示する
     */
    public function create()
    {
        return view('slides.create');
    }

    /**
     * 新しいスライドを保存する
     */
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'pr_text' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // 画像を保存
        $imagePath = $request->file('image')->store('slides', 'public');

        // 現在の最大 order を取得して +1
        $maxOrder = Slide::max('order') ?? 0;

        // 新しいスライドを作成
        Slide::create([
            'pr_text' => $validated['pr_text'],
            'image_path' => $imagePath,
            'order' => $maxOrder + 1, // 表示順を最後尾に
        ]);

        return redirect()->route('slides.admin')->with('success', 'スライドを追加しました。');
    }

    /**
     * スライド編集フォームを表示する
     */
    public function edit(Slide $slide)
    {
        return view('slides.edit', compact('slide'));
    }

    /**
     * スライドを更新する
     */
    public function update(Request $request, Slide $slide)
    {
        // バリデーション
        $validated = $request->validate([
            'pr_text' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'order' => 'required|integer|min:0',
        ]);

        // 新しい画像がアップロードされた場合
        if ($request->hasFile('image')) {
            // 古い画像を削除
            Storage::disk('public')->delete($slide->image_path);

            // 新しい画像を保存
            $imagePath = $request->file('image')->store('slides', 'public');
            $slide->image_path = $imagePath;
        }

        // データを更新
        $slide->update([
            'pr_text' => $validated['pr_text'],
            'order' => $validated['order'],
        ]);

        return redirect()->route('slides.admin')->with('success', 'スライドを更新しました。');
    }

    /**
     * スライドを削除する
     */
    public function destroy(Slide $slide)
    {
        // 画像ファイルを削除
        Storage::disk('public')->delete($slide->image_path);

        // スライドを削除
        $slide->delete();

        return redirect()->route('slides.admin')->with('success', 'スライドを削除しました。');
    }
}
