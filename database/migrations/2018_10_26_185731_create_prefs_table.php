<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrefsTable extends Migration {

	public function up()
	{
		Schema::create('prefs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('pref');
			$table->string('suggest');
			$table->integer('userID');
		});
	}

	public function down()
	{
		Schema::drop('prefs');
	}
}