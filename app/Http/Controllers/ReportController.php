<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\LineService;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(10); // 最新順で10件ずつページネーション
        return view('reports.index', compact('reports'));
    }

    public function admin()
    {
        $reports = Report::latest()->paginate(10); // 最新順で10件ずつページネーション
        return view('reports.admin', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120', // 画像は任意
        ]);

        // まずレコードを作成
        $report = Report::create([
            'title' => $validated['title'],
            'date' => $validated['date'],
            'content' => $validated['content'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            // ファイルを "reports" に保存 (IDなし)
            $path = $request->file('image')->store('reports', 'public');
            // 保存したパスをモデルに更新
            $report->update(['image_path' => $path]);
        }

        // LINEにお知らせを送信
        $message = "【活動報告】\n" . $report->title . "\n" . url('/reports');
        LineService::sendAnnouncement($message);
        

        return redirect()->route('reports.admin')->with('success', '活動報告が追加されました！');
    }

    public function edit($id)
    {
        // 指定されたIDの活動報告を取得
        $report = Report::findOrFail($id);

        // 編集画面を返す
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);
    
        // 指定された活動報告を取得
        $report = Report::findOrFail($id);
    
        // 入力データを更新
        $report->title = $validatedData['title'];
        $report->date = $validatedData['date'];
        $report->content = $validatedData['content'];
    
        // 画像がアップロードされた場合の処理
        if ($request->hasFile('image')) {
            // 古い画像を削除
            if ($report->image_path) {
                Storage::delete($report->image_path);
            }
    
            // 新しい画像を保存
            $path = $request->file('image')->store('images', 'public');
            $report->image_path = $path;
        }
    
        // 保存
        $report->save();
    
        // 更新成功メッセージとともにリダイレクト
        return redirect()->route('reports.admin')->with('success', '活動報告を更新しました。');
    }
        

    public function destroy($id)
    {
        // 指定されたIDの活動報告を検索
        $report = Report::findOrFail($id);

        // 削除処理
        $report->delete();

        // 削除後のリダイレクトとメッセージ
        return redirect()
            ->route('reports.admin')
            ->with('success', '活動報告を削除しました。');
    }
}
