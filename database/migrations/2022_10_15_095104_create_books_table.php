<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string('book_title')->unique();
            $table->binary('book_pict');
            $table->string('book_price');
            $table->string('book_description')->nullable();
            $table->integer('book_quantity');
            $table->integer('book_pageNum');
            $table->string('book_lang');
            $table->string('book_publisher');
            $table->date('book_publishDate');
            $table->string('book_isbn');
            $table->boolean('isBookPaid');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('author_id')->on('authors');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
