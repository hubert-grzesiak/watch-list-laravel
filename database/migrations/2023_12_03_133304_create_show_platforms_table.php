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
        Schema::create('show_platforms', function (Blueprint $table) {
            $table->unsignedBigInteger('show_id');
            $table->unsignedBigInteger('platform_id');

            $table->primary(['show_id', 'platform_id']);
            $table->foreign('show_id')->references('id')->on('shows');
            $table->foreign('platform_id')->references('id')->on('platforms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('show_platforms');
    }
};
