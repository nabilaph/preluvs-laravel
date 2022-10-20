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
            $table->string('book_title');
            $table->string('slug')->nullable();
            $table->string('book_pict')->nullable();
            $table->bigInteger('book_price');
            $table->string('book_description')->nullable()->default('-');
            $table->string('book_author');
            $table->integer('book_quantity');
            $table->integer('book_pageNum');
            $table->string('book_lang');
            $table->string('book_publisher')->nullable()->default('-');
            $table->date('book_publishDate')->nullable();
            $table->string('book_isbn')->nullable()->default('-');
            $table->boolean('isBookPaid')->default(false);
            $table->date('book_soldDate')->nullable();
            $table->string('receipt_num')->nullable()->default('-');

            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->foreign('buyer_id')->references('id')->on('users');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories');

            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users');
            
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
