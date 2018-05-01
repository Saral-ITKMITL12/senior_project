<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->text('description');
            $table->string('status')->default('เปิด');
            $table->string('winner')->nullable();
            $table->string('category');
            $table->dateTime('open_time');
            $table->dateTime('close_time');
            $table->Integer('bid_step');
            $table->Integer('start_price');
            $table->Integer('price');
            $table->tinyInteger('user_id');
            $table->string('images');
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
        Schema::dropIfExists('auction_products');
    }
}
