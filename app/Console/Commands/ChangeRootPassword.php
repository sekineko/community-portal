<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangeRootPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'root:change-password {--password= : 新しいパスワード（省略時は対話式入力）}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ルートユーザーのパスワードを変更します';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // ルートユーザーを取得
        $rootUser = User::where('role', 'root')->first();
        
        if (!$rootUser) {
            $this->error('ルートユーザーが見つかりません。');
            return 1;
        }

        $this->info("現在のルートユーザー: {$rootUser->name} ({$rootUser->email})");

        // パスワードの取得
        $password = $this->option('password');
        
        if (!$password) {
            $password = $this->secret('新しいパスワードを入力してください');
            $confirmPassword = $this->secret('パスワードを再入力してください');
            
            if ($password !== $confirmPassword) {
                $this->error('パスワードが一致しません。');
                return 1;
            }
        }

        // パスワードのバリデーション
        $validator = Validator::make(['password' => $password], [
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            $this->error('パスワードは8文字以上である必要があります。');
            return 1;
        }

        // 確認
        if (!$this->confirm('ルートユーザーのパスワードを変更しますか？')) {
            $this->info('キャンセルされました。');
            return 0;
        }

        // パスワード更新
        try {
            $rootUser->password = Hash::make($password);
            $rootUser->save();
            
            $this->info('ルートユーザーのパスワードが正常に変更されました。');
            
            // .envファイルの更新を推奨
            $this->warn('注意: .envファイルのROOT_USER_PASSWORDも更新することを推奨します。');
            $this->line('これにより、次回のシーダー実行時に一貫性が保たれます。');
            
            return 0;
        } catch (\Exception $e) {
            $this->error('パスワードの変更に失敗しました: ' . $e->getMessage());
            return 1;
        }
    }
}
