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
    Schema::create('borrow_records', function (Blueprint $table) {
        $table->id();

        $table->foreignId('book_id')
              ->constrained()
              ->onDelete('cascade');

        $table->foreignId('member_id')
              ->constrained()
              ->onDelete('cascade');

        // Use dateTime for accuracy
        $table->dateTime('borrowed_at');
        $table->dateTime('due_date');
        $table->dateTime('returned_at')->nullable();

        // Optional but good practice
        $table->string('status')->default('borrowed');
        // borrowed / returned / overdue

        $table->timestamps();

        // Performance indexes
        $table->index(['book_id', 'returned_at']);
        $table->index('member_id');
    });
}

};
