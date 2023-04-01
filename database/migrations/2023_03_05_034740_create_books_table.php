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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('booksName');
            $table->longText('booksImage');
            $table->foreignId('category_id');
            $table->foreignId('author_id');

            $table->foreign('category_id')->on('category')->references('id')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->foreign('author_id')->on('author')->references('id')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
