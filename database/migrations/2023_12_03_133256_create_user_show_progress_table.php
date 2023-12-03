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
        // Migracja dla rozszerzenia tabeli UserShowProgress
        Schema::create('user_show_progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('show_id');
            $table->unsignedBigInteger('state_id');
            $table->boolean('watched')->default(false);
            $table->integer('current_episode')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('show_id')->references('id')->on('shows');
            $table->foreign('state_id')->references('id')->on('states');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_show_progress');
    }
};
