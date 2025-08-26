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
        Schema::table('reports', function (Blueprint $table) {
            DB::statement("UPDATE reports SET image_path = REPLACE(image_path, 'activity_reports', 'reports')");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            DB::statement("UPDATE reports SET image_path = REPLACE(image_path, 'reports', 'activity_reports')");
        });
    }
};
