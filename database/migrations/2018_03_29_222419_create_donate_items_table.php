<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate_items', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->text('description');
          $table->string('status')->default('เปิด');
          $table->string('condition')->nullable();
          $table->string('category');
          $table->dateTime('open_time');
          $table->dateTime('close_time');
          $table->tinyInteger('user_id');
          $table->string('images');
          $table->string('recipient')->nullable();
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
        Schema::dropIfExists('donate_items');
    }
}
