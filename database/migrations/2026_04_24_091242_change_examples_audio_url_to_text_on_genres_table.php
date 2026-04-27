<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('genres', function (Blueprint $table) {
            $table->text('examples_audio_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('genres', function (Blueprint $table) {
            $table->string('examples_audio_url')->nullable()->change();
        });
    }
};
