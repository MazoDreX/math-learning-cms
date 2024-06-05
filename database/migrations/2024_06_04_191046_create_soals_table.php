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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subbab_id')->constrained()->cascadeOnDelete();
            $table->text('soal'); // Kolom untuk menyimpan soal
            $table->text('jawaban'); // Kolom untuk menyimpan jawaban yang benar
            $table->text('option_a'); // Kolom untuk menyimpan opsi A
            $table->text('option_b'); // Kolom untuk menyimpan opsi B
            $table->text('option_c'); // Kolom untuk menyimpan opsi C
            $table->text('option_d'); // Kolom untuk menyimpan opsi D
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
