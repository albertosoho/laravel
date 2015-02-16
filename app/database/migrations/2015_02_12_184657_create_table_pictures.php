<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePictures extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('md5', 32);
			$table->string('url', 256);
			$table->char('author', 32)->reference('id')->on('users');
			$table->string('oldname', 256);
			$table->integer('width');
			$table->integer('height');
			$table->char('colors', 36);
			$table->char('mimetype', 64);
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
		Schema::drop('pictures');
	}

}
