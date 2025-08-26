<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Storage;
use App\Services\LineService;

class NoticeController extends Controller
{
    public function index() {
        $notices = Notice::latest()->paginate(10);
        return view('notices.index', compact('notices'));
    }

    public function admin()
    {
        $notices = Notice::latest()->paginate(10);
        return view('notices.admin', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // お知らせ作成ページを返す
        return view('notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 画像制限 5MB
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // PDF制限 10MB
        ]);
    
        $data = $request->only(['title', 'content']);
    
        // 画像を保存
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('notices/images', 'public');
        }
    
        // PDFを保存
        if ($request->hasFile('pdf')) {
            $data['pdf_path'] = $request->file('pdf')->store('notices/pdf', 'public');
        }
    
        Notice::create($data);

        // LINEにお知らせを送信
        $message = "【お知らせ】\n" . $data['title'] . "\n" . url('/notices');
        LineService::sendAnnouncement($message);
        
    
        return redirect()->route('notices.admin')->with('success', 'お知らせを登録しました');
    }
        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 指定されたIDのお知らせを取得
        $notice = Notice::findOrFail($id);
    
        // 編集画面を表示
        return view('notices.edit', compact('notice'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);
    
        $data = $request->only(['title', 'content']);
    
        // 画像の更新
        if ($request->hasFile('image')) {
            if ($notice->image_path) {
                Storage::disk('public')->delete($notice->image_path);
            }
            $data['image_path'] = $request->file('image')->store('notices/images', 'public');
        }
    
        // PDFの更新
        if ($request->hasFile('pdf')) {
            if ($notice->pdf_path) {
                Storage::disk('public')->delete($notice->pdf_path);
            }
            $data['pdf_path'] = $request->file('pdf')->store('notices/pdf', 'public');
        }
    
        $notice->update($data);
    
        return redirect()->route('notices.admin')->with('success', 'お知らせを更新しました');
    }
        
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        if ($notice->image_path) {
            Storage::disk('public')->delete($notice->image_path);
        }
        if ($notice->pdf_path) {
            Storage::disk('public')->delete($notice->pdf_path);
        }
    
        $notice->delete();
    
        return redirect()->route('notices.admin')->with('success', 'お知らせを削除しました');
    }
}
