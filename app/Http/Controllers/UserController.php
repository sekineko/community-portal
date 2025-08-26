<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        // ユーザー一覧ページ
        public function admin()
        {
            $users = User::all();
            return view('users.admin', compact('users'));
        }

        // ユーザー作成ページ
        public function create()
        {
            return view('users.create');
        }

        // ユーザー保存
        public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8|confirmed',
            ]);
        
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);
        
            return redirect()->route('users.admin')->with('success', 'ユーザーを登録しました。');
        }        

        // ユーザー削除
        public function destroy(User $user)
        {
            if ($user->role === 'root') {
                return redirect()->back()->with('error', 'ルートユーザーは削除できません。');
            }
            // ユーザーを削除
            $user->delete();
    
            // 削除完了メッセージとともにリダイレクト
            return redirect()->route('users.admin')->with('success', 'ユーザーが削除されました。');        //
        }
    
}
