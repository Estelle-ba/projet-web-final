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
        Schema::create('representative', function (Blueprint $table) {
            $table->id('id')->autoIncrement();
            $table->string('name');
            $table->string('lastname');
            $table->string('mail');
            $table->foreignId('class_id')->nullable()->references('id')->on('class')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_representatives');
    }
};
