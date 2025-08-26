<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notice;
use App\Models\Event;
use App\Models\Report;
use App\Models\Document;
use App\Models\Slide;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ルートユーザーを作成
        User::factory()->create([
            'name' => 'サンプル管理者',
            'email' => env('ROOT_USER_ID', 'admin@example.com'),
            'password' => Hash::make(env('ROOT_USER_PASSWORD', 'samplepass')),
            'role' => 'root',
        ]);

        // 一般ユーザーを作成
        User::factory()->create([
            'name' => 'サンプルユーザー',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // サンプルお知らせを作成
        Notice::create([
            'title' => '町会費の納入について',
            'content' => '令和6年度の町会費の納入期限は3月31日までとなっております。お忘れのないようお願いいたします。',
            'created_at' => now()->subDays(5),
        ]);

        Notice::create([
            'title' => '春の清掃活動のお知らせ',
            'content' => '4月の第二土曜日に春の清掃活動を実施いたします。多くの皆様のご参加をお待ちしております。',
            'created_at' => now()->subDays(10),
        ]);

        // サンプルイベントを作成
        Event::create([
            'title' => '夏祭り',
            'content' => '地域住民の皆様との交流を深める夏祭りを開催いたします。',
            'date' => now()->addMonths(2)->format('Y-m-d'),
            'start_time' => '18:00:00',
            'end_time' => '21:00:00',
            'location' => '夕やけ三丁目公園',
            'created_at' => now()->subDays(3),
        ]);

        Event::create([
            'title' => '防災訓練',
            'content' => '地域の防災意識向上のため、避難訓練を実施いたします。',
            'date' => now()->addMonth()->format('Y-m-d'),
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'location' => '地域センター',
            'created_at' => now()->subDays(7),
        ]);

        // サンプル活動報告を作成
        Report::create([
            'title' => '3月度清掃活動報告',
            'date' => now()->subDays(15)->format('Y-m-d'),
            'content' => '3月の清掃活動には30名の方にご参加いただきました。ありがとうございました。',
            'created_at' => now()->subDays(15),
        ]);

        // サンプル公開資料を作成
        Document::create([
            'title' => '町会規約',
            'file_path' => 'documents/sample_rules.pdf',
            'created_at' => now()->subDays(30),
        ]);

        Document::create([
            'title' => '役員名簿',
            'file_path' => 'documents/sample_members.pdf',
            'created_at' => now()->subDays(20),
        ]);

        // サンプルスライドを作成
        Slide::create([
            'pr_text' => '夕やけ三丁目サンプル町会へようこそ！
地域の皆様と一緒に、安全で住みやすい街づくりを目指しています。',
            'image_path' => 'slides/sample_slide1.jpg',
            'order' => 1,
            'created_at' => now()->subDays(1),
        ]);

        Slide::create([
            'pr_text' => '定期的な清掃活動や防災訓練を通じて、
地域の絆を深めています。
ぜひ町会活動にご参加ください。',
            'image_path' => 'slides/sample_slide2.jpg',
            'order' => 2,
            'created_at' => now()->subDays(2),
        ]);
    }
}
