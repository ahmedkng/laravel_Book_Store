<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_order', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('book_id')->unsigned();
           $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
           $table->integer('order_id')->unsigned();
           $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_order');
    }
}
