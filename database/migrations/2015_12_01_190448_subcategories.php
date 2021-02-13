<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subcategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('subcategories', function(Blueprint $table)
    {
      $table->increments('id');
      $table->integer('on_category')->unsigned()->default(0);
      $table->foreign('on_category')
          ->references('id')->on('categories')
          ->onDelete('cascade');
      $table->text('name');
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
		//
	}

}
