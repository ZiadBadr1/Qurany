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
        Schema::create('souras', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->string('file');
            $table->string('format')->nullable();
            $table->string('size')->nullable();
            $table->string('download')->default(0);
            $table->foreignId('category_id')->constrained('categories')->references('id')->cascadeOnDelete();
            $table->string('soura_title');
            $table->foreign('soura_title')->references('title')->on('soura_cards');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souras');
    }
};
