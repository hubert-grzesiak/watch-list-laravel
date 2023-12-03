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
        Schema::create('show_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('show_id');
            $table->unsignedBigInteger('category_id');

            // Definiowanie klucza podstawowego dla tej tabeli pośredniej
            $table->primary(['show_id', 'category_id']);

            // Ustawianie kluczy obcych
            $table->foreign('show_id')->references('id')->on('shows');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_categories');
    }
};
