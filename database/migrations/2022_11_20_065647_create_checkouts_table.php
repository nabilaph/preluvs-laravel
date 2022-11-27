<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->string('number_invoice');
            $table->string('receipt_no')->nullable();
            $table->enum('payment_method', ['BCA', 'GOPAY','OVO', 'BNI', 'MANDIRI']);
            $table->enum('status', ['UNPAID', 'PAID','DELIVERED']);
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
        Schema::dropIfExists('checkouts');
    }
}
