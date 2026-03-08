<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('word_id')->constrained('words')->onDelete('cascade');
            $table->string('quiz_type'); // mcq or write
            $table->string('question');
            $table->string('correct_answer');
            $table->string('user_answer')->nullable();
            $table->boolean('is_correct');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attempts');
    }
};