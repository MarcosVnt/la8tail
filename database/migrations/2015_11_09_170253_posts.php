<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Posts extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // blog table
    //Schema::create('posts', function(Blueprint $table)
    Schema::table('posts', function(Blueprint $table)
    {
      $table->increments('id');
      
      $table -> integer('author_id') -> unsigned() -> default(0);
      $table->foreign('author_id')
          ->references('id')->on('users')
          ->onDelete('cascade');
      $table->string('title')->unique();
      $table->text('body');
      $table->string('slug')->unique();
      $table->boolean('active');
      $table->timestamps();
    });

    //DB::statement("ALTER TABLE posts ADD COLUMN c LONGBLOB"); 
    
    DB::statement("ALTER TABLE posts ADD COLUMN category_id  INTEGER UNSIGNED NULL");
    DB::statement("ALTER TABLE posts ADD COLUMN subcategory_id  INTEGER UNSIGNED NULL");
    // para añadir comentar 
    DB::statement("ALTER TABLE posts ADD COLUMN imagen VARCHAR(255)");




  }
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    // drop blog table
    Schema::drop('posts');
  }
}