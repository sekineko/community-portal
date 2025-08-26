<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    // 一覧表示
    public function index()
    {
        // 現在の日付から1ヶ月前の日付を取得
        $oneMonthAgo = Carbon::now()->subMonth();

        // 1ヶ月前以降のデータを取得し、最新順にソート
        $events = Event::where('date', '>=', $oneMonthAgo)
                            ->orderBy('date', 'asc')
                            ->get();

        return view('events.index', compact('events'));
    }

    // 一覧表示
    public function admin()
    {
        $events = Event::orderBy('date', 'desc')->paginate(10); // 新しい順に表示、10件ずつページネーション
        return view('events.admin', compact('events'));
    }


    // 新規作成フォーム
    public function create()
    {
        return view('events.create');
    }

    // データ保存
    public function store(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'date' => 'required|date',
            'start_hour' => 'nullable|integer|min:0|max:23',
            'start_minute' => 'nullable|integer|min:0|max:59',
            'end_hour' => 'nullable|integer|min:0|max:23',
            'end_minute' => 'nullable|integer|min:0|max:59',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);
    
        if ($request->filled(['start_hour', 'start_minute'])) {
            $validatedData['start_time'] = sprintf('%02d:%02d:00', $request->start_hour, $request->start_minute);
        } else {
            $validatedData['start_time'] = null;
        }
        
        if ($request->filled(['end_hour', 'end_minute'])) {
            $validatedData['end_time'] = sprintf('%02d:%02d:00', $request->end_hour, $request->end_minute);
        } else {
            $validatedData['end_time'] = null;
        }
            
        // 不要な start_hour, start_minute, end_hour, end_minute を削除
        unset($validatedData['start_hour'], $validatedData['start_minute'], $validatedData['end_hour'], $validatedData['end_minute']);
    
        // データを保存
        Event::create($validatedData);
    
        // 成功メッセージとともにリダイレクト
        return redirect()->route('events.admin')->with('success', '行事予定を作成しました。');
    }
        
    // 詳細表示
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // 編集フォーム
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // データ更新
    public function update(Request $request, $id)
    {
        // バリデーション
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_hour' => 'nullable|integer|min:0|max:23',
            'start_minute' => 'nullable|integer|min:0|max:59',
            'end_hour' => 'nullable|integer|min:0|max:23',
            'end_minute' => 'nullable|integer|min:0|max:59',
            'location' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);
    
        if ($request->filled(['start_hour', 'start_minute'])) {
            $validatedData['start_time'] = sprintf('%02d:%02d:00', $request->start_hour, $request->start_minute);
        } else {
            $validatedData['start_time'] = null;
        }
        
        if ($request->filled(['end_hour', 'end_minute'])) {
            $validatedData['end_time'] = sprintf('%02d:%02d:00', $request->end_hour, $request->end_minute);
        } else {
            $validatedData['end_time'] = null;
        }
    
        // 不要なデータを削除
        unset($validatedData['start_hour'], $validatedData['start_minute'], $validatedData['end_hour'], $validatedData['end_minute']);
    
        // イベントの取得と更新
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'location' => $validatedData['location'],
            'content' => $validatedData['content'],
        ]);
    
        // リダイレクト
        return redirect()->route('events.admin')->with('success', '行事予定を更新しました。');
    }
        
    // データ削除
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.admin')->with('success', '行事予定を削除しました。');
    }
}
