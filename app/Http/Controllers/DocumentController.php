<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::orderBy('updated_at', 'desc')->get();
        return view('documents.index', compact('documents'));
    }

    public function admin()
    {
        $documents = Document::orderBy('updated_at', 'desc')->get();
        return view('documents.admin', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:5120',
        ]);

        $filePath = $request->file('file')->store('documents', 'public');

        Document::create([
            'title' => $request->title,
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.admin')->with('success', '文書を登録しました');
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    
        // 更新データ
        $data = [
            'title' => $request->title,
        ];
    
        // 新しいPDFファイルがアップロードされた場合
        if ($request->hasFile('file')) {
            // 古いファイルを削除
            Storage::disk('public')->delete($document->file_path);
    
            // 新しいファイルを保存
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }
    
        // データベースを更新
        $document->update($data);
    
        return redirect()->route('documents.admin')->with('success', '公開資料を更新しました');
    }


    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.admin')->with('success', '文書を削除しました');
    }
}
