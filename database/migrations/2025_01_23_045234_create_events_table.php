<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // 日付
            $table->time('start_time')->nullable(); // 開始時間
            $table->time('end_time')->nullable(); // 終了時間
            $table->string('title'); // タイトル
            $table->text('content')->nullable(); // 内容
            $table->string('location')->nullable(); // 場所
            $table->string('target')->nullable(); // 対象（任意）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
