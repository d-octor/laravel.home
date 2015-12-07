<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table){
          $table->increments('id');
          $table->string('title');
          $table->text('description');
          $table->string('preview');
          $table->decimal('prise', 10,2);  // Это ограницение ценника 8-ми зчным числом с копейками в
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
        Schema::drop('items');
    }
}
