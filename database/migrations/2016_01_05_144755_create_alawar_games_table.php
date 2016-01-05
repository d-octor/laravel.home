<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlawarGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('alawar_games', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name', 75)->unique();
           $table->text('comments')->nullable();
           $table->integer('rating');
           $table->date('rel_date');
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
         Schema::drop('alawar_games');
     }
}
