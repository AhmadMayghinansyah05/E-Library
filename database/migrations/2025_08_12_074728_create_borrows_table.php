<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->string('borrower_name');
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->timestamps();

            $table->foreign('book_id')
                  ->references('id')
                  ->on('books')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
