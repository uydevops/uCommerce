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
        Schema::create('ad_settings', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title');
            $table->string('slider_description');
            $table->string('slider_image');
            $table->string('small_banner_title');
            $table->string('small_banner_description');
            $table->string('small_banner_image');
            $table->string('medium_banner_title');
            $table->string('medium_banner_description');
            $table->string('medium_banner_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_settings');
    }
};
