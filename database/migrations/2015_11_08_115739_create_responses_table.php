<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userid');
			$table->integer('itemid');
			$table->integer('categoryid');
			$table->integer('resonpsestatus');
			$table->integer('responsetype');
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
		Schema::drop('responses');
	}

}
