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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->integer('category_id')->nullable();
            $table->string('image', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->tinyInteger('isPublish')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('isDelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
