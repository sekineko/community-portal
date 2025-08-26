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
        Schema::table('activity_reports', function (Blueprint $table) {
            Schema::rename('activity_reports', 'reports'); // テーブル名を変更
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_reports', function (Blueprint $table) {
            Schema::rename('reports', 'activity_reports'); // 逆マイグレーション用
        });
    }
};
