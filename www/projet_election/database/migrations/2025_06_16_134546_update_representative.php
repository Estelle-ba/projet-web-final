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

        Schema::table('representative', function (Blueprint $table) {
            $table->foreignId('id_representative')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('id_suppleant')->references('id')->on('users')->cascadeOnDelete();
            $table->string('video_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
