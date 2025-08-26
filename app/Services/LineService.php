<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class LineService
{
    /**
     * LINEにお知らせを送信する
     */
    public static function sendAnnouncement($message)
    {
        $lineToken = env('LINE_CHANNEL_ACCESS_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => "Bearer $lineToken",
            'Content-Type' => 'application/json',
        ])->post('https://api.line.me/v2/bot/message/broadcast', [
            'messages' => [
                ['type' => 'text', 'text' => $message]
            ]
        ]);

        return $response->json();
    }
}
