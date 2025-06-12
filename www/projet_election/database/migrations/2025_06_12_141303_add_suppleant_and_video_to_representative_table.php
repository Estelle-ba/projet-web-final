<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('representative', function (Blueprint $table) {
            $table->string('suppleant')->nullable();
            $table->string('video_link')->nullable();
        });
    }

    public function down()
    {
        Schema::table('representative', function (Blueprint $table) {
            $table->dropColumn(['suppleant', 'video_link']);
        });
    }

};
