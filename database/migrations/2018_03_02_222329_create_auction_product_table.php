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
            $table->string('status')->default('open');
            $table->string('winner')->nullable();
            $table->dateTime('open_time');
            $table->dateTime('close_time');
            $table->tinyInteger('bid_step');
            $table->tinyInteger('price');
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
