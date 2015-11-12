<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('userid');
			$table->string('responsegroupid');
			$table->integer('lower');   // giving permissions for a range of items this user is allowed to access.
			$table->integer('upper');
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
		Schema::drop('item_permissions');
	}

}
