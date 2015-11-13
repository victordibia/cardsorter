<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		
		//delete users table records
		DB::table('users')->delete();
		//insert some dummy records
		DB::table('users')->insert(array(
		array('name'=>'Victor Dibia','email'=>'victor.dibia@gmail.com','password'=> bcrypt('victor')),
		array('name'=>'Demo One Account','email'=>'demo@gmail.com','password'=> bcrypt('demodemo')),
		));
	}

}
