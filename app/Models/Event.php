<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // ホワイトリスト（登録可能なフィールド）
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'title',
        'content',
        'location',
    ];
}
