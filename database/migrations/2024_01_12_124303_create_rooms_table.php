<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('numberRoom')->nullable();
            $table->string('types')->nullable();
            $table->float('price',8,0)->nullable();
            $table->integer('discount')->nullable();
            $table->string('service', 500)->nullable();
            $table->string('title')->nullable();
            $table->string('bed')->nullable();
            $table->string('customer')->nullable();
            $table->string('description', 255)->nullable();
            $table->string('img', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
