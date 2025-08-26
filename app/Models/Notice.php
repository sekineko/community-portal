<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    // ホワイトリスト（登録可能なフィールド）
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'pdf_path',
    ];
}
