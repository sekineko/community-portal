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
        Schema::table('notices', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('content'); // 画像のパス（null許可）
            $table->string('pdf_path')->nullable()->after('image_path'); // PDFのパス（null許可）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->dropColumn(['image_path', 'pdf_path']);
        });
    }
};
