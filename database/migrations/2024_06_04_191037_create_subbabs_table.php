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
        Schema::create('subbabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bab_id')->constrained()->cascadeOnDelete();
            $table->string('subbabJudul');
            $table->text('subbabIsi')->nullable();
            $table->string('slug')->unique();
            $table->json('tags')->nullable();
            $table->enum('creator', ['Daniel','Samuel','Darren', 'Christopher', 'Julio', 'Surya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subbabs');
    }
};
