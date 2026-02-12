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
            // Changed from 'Category' string to a foreign key for the categories table
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            // Matched casing to BookController.php (Title, Author, ISBN, Quantity)
            $table->string('Title');
            $table->string('Author');
            $table->string('ISBN')->unique();
            $table->integer('Quantity')->default(1); 
            
            // Keep status tracking for the BorrowController
            $table->boolean('available')->default(true);
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