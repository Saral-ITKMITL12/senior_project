<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionTranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bid_price');
            $table->tinyInteger('user_id');
            $table->tinyInteger('auction_product_id');
            $table->timestamps();
            $table->string('user_name',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_trans');
    }
}
