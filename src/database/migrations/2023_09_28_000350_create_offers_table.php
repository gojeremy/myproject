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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content')->nullable();
            $table->string('urlToImage')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->integer('published')->default(0);
            $table->string('category')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
