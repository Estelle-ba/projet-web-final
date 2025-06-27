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
        Schema::create('event', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->string('type_event');
            $table->dateTime('date_beggining');
            $table->dateTime('date_end');
            $table->string('people');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('type_event');
            $table->dropColumn('date_beggining');
            $table->dropColumn('date_end');
            $table->dropColumn('people');
        });
    }
};
