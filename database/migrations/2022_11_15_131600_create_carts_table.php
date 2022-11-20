<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('book_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('book_quantity');
            $table->double('total', 12, 2)->default(0);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('book_id')->on('books');
            
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
        Schema::dropIfExists('carts');
    }
}
