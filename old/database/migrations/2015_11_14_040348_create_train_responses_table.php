<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainResponsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('train_responses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userid');
			$table->integer('itemid');
			$table->integer('categoryid');
			$table->integer('responsestatus');
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
		Schema::drop('train_responses');
	}

}
