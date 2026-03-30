<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('maqam_genre', function (Blueprint $table) {
            $table->foreignId('maqam_id')->constrained('maqams')->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained('genres')->cascadeOnDelete();

            $table->primary(['maqam_id', 'genre_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maqam_genre');
    }
};
