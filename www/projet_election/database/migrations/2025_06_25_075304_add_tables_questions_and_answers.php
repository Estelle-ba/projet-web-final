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
        Schema::create('questions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('question');
            $table->integer('class_id')->nullable()->references('id')->on('class')->cascadeOnDelete();
            $table->integer('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('answer');
            $table->integer('question_id')->nullable()->references('id')->on('questions')->cascadeOnDelete();
            $table->integer('class_id')->nullable()->references('id')->on('class')->cascadeOnDelete();
            $table->integer('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('question');
            $table->dropColumn('class_id');
            $table->dropColumn('user_id');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('answer');
            $table->dropColumn('question_id');
            $table->dropColumn('class_id');
            $table->dropColumn('user_id');
        });
    }
};
