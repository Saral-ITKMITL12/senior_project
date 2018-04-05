<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('address', 50);
            $table->string('year');
            $table->string('faculty');
            $table->string('degree');
            $table->string('line_id', 30);
            $table->string('studentcard_id', 10)->unique();
            $table->integer('donate_point')->default(0);
            $table->integer('accept_status')->default(0);
            $table->string('image_id');
            $table->string('image_profile');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
