<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'pr_text',
        'image_path',
        'order', // 表示順
    ];    
}
