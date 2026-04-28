<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nationality');
            $table->string('city');
            $table->text('biography')->nullable();
            $table->text('audio_examples')->nullable();
            $table->string('image')->nullable();
            $table->string('films')->nullable();
            $table->integer('songs')->nullable();
            $table->integer('years_active')->nullable();
            $table->date("birth_day");
            $table->date("date_of_death")->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};