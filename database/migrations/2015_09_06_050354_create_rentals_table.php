<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estate_id')->unsigned();
            $table->foreign('estate_id')->references('id')->on('estates');
            $table->integer('rentaltype_id')->unsigned();
            $table->foreign('rentaltype_id')->references('id')->on('rentaltypes');
            $table->string('title');
            $table->text('description');
            $table->boolean('available')->default(0);
            $table->string('image');
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
        Schema::drop('rentals');
    }
}
