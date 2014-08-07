<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('markers', function($table) {
			$table->increments('id');
			$table->string('type');
			$table->foreign('type')->references('type')->on('problems');
			$table->float('lat', 10, 6);
			$table->float('lng', 10, 6);
			$table->string('name');
			$table->string('email');
			$table->string('comments');
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
		Schema::drop('markers');
	}

}
