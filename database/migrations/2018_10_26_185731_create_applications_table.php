<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration {

	public function up()
	{
		Schema::create('applications', function(Blueprint $table) {
			$table->increments('id');
			$table->string('appID');
			$table->integer('userID');
		});
	}

	public function down()
	{
		Schema::drop('applications');
	}
}