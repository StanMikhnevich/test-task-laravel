<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorBookTable extends Migration
{
    public function up()
    {
        Schema::create('author_book', function (Blueprint $table) {
            $table->foreignId('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
            $table->foreignId('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('author_book');
    }
}
