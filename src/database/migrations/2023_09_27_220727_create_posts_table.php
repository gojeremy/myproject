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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('source_id')->nullable(); // Идентификатор источника
            $table->string('source_name')->nullable(); // Название источника
            $table->string('author')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('url')->nullable();
            $table->string('urlToImage');
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->integer('published')->default(0);
            $table->string('category')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
