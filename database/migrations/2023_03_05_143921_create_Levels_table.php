<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLevelsTable extends Migration {

	public function up()
	{
		Schema::create('Levels', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('Name');
			$table->string('Notes');
		});
	}

	public function down()
	{
		Schema::drop('Levels');
	}
}