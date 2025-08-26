<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Slide;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // スライド取得
        $slides = Slide::orderBy('order')->get(); // orderでソートして取得
    
        // 現在の日付から1ヶ月前の日付を取得
        $oneMonthAgo = Carbon::now()->subMonth();
    
        // 1ヶ月前以降の `Notice` の件数を取得
        $countRecentNotices = Notice::where('created_at', '>=', $oneMonthAgo)->count();
    
        // 1ヶ月前以降のデータが5件以上ある場合はすべて取得、それ以外は最新5件を取得
        if ($countRecentNotices >= 5) {
            $notices = Notice::where('created_at', '>=', $oneMonthAgo)
                             ->latest('created_at')
                             ->get();
        } else {
            $notices = Notice::latest('created_at')
                             ->take(5)
                             ->get();
        }
    
        // homeビューにデータを渡す
        return view('home', compact('slides', 'notices'));
    }
}
