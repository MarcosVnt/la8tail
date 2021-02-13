<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesPosts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
            $table->string('name')->unique();
			$table->timestamps();
		});

		Schema::create('category_post', function(Blueprint $table)
		{
			//Many To many relationship
			$table->integer('post_id')->unsigned()->index();
			$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
				//Schema::drop('category_post');
				Schema::drop('categories');


	}

}
