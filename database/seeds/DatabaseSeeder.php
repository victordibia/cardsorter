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


		//delete users table records
		   DB::table('users')->delete();
		//insert some dummy records
		DB::table('users')->insert(array(
		array('name'=>'Victor Dibia','email'=>'victor.dibia@gmail.com','password'=> bcrypt('victor')),
		array('name'=>'Demo One Account','email'=>'demo@gmail.com','password'=> bcrypt('demodemo')),
		));  
		  
		
		// Seed Category database 
		DB::table('categories')->delete();
		//insert some dummy records
		DB::table('categories')->insert(array(
		array('title'=>'Information gathering', 'code'=> 'IGG','codegroup'=> 'IG', 'description'=> 'What are the supported tools, languages, simulators etc?','projectid'=> 1 ),
		array('title'=>'Idea Verification (Validity)', 'code'=> 'IVV','codegroup'=> 'IV', 'description'=> 'Atemppt to verify ideas by getting feedback from both moderators and fellow participants','projectid'=> 1),
		array('title'=>'Idea Verification (Eligibility)', 'code'=> 'IVE','codegroup'=> 'IV', 'description'=> 'Evaluating eligibility of ideas','projectid'=> 1),
		array('title'=>'Rule Clarification (Deliverable)', 'code'=> 'RCD','codegroup'=> 'RC', 'description'=> 'Clarifying rules on contest deliverable','projectid'=> 1),
		array('title'=>'Rule Clarification (Submission)', 'code'=> 'RCS','codegroup'=> 'RC', 'description'=> 'Clarifying rules on contest submission process','projectid'=> 1),
		array('title'=>'Rule Clarification (General)', 'code'=> 'RCG','codegroup'=> 'RC', 'description'=> 'Clarifying rules on other issues','projectid'=> 1),
		array('title'=>'Support (Request)', 'code'=> 'SPR','codegroup'=> 'SP', 'description'=> 'Requesting help','projectid'=> 1),
		array('title'=>'Support (Thanks)', 'code'=> 'SPT','codegroup'=> 'SP', 'description'=> 'Acknowledging successful help received','projectid'=> 1),
		array('title'=>'Support (Provision)', 'code'=> 'SPP','codegroup'=> 'SP', 'description'=> 'Providing help','projectid'=> 1),
		array('title'=>'Satisfaction (Process)', 'code'=> 'SAP','codegroup'=> 'SA', 'description'=> 'Expressing emotion related to rules, certification or submission process','projectid'=> 1),
		array('title'=>'Satisfaction (Outcome)', 'code'=> 'SAO','codegroup'=> 'SA', 'description'=> 'Expressing emotion related to contest outcome','projectid'=> 1),
		array('title'=>'Random Stuff (Outcome)', 'code'=> 'RAND','codegroup'=> 'RA', 'description'=> 'Expressing emotion related to contest outcome','projectid'=> 2),
		));
		
		
		
		// Seed Train table
		DB::table('train_items')->delete();
		//insert some dummy records
		DB::table('train_items')->insert(array(
		array('title'=>'Information gathering',  'description'=> 'Where can I download the Tizen SDK?'),
		array('title'=>'Information gathering',  'description'=> 'I am 14 and italian, am I eligible for the contest?'),
		array('title'=>'Information gathering',  'description'=> 'I am dissapointed with the results that have been announced'),
		array('title'=>'Information gathering',  'description'=> 'Excellnet suggest! Thanks, it worked really well for me!'),
		array('title'=>'Information gathering',  'description'=> 'I have an idea about making apps for runners, would this be eligible. Also, can I use external hardware?'),
		
		));
		
		
		// Seed Train table
		DB::table('projects')->delete();
		//insert some dummy records
		DB::table('projects')->insert(array(
		array('title'=>'ChallengePost', 'ownerid' => 1, 'description'=> 'Code text data from a Challengepost software crowdsourcing contest'),
		array('title'=>'Random', 'ownerid' => 1, 'description'=> 'Test Project'),
		 	
		));
		
		
		// Seed Permissions table
		DB::table('permissions')->delete();
		//insert some dummy records
		DB::table('permissions')->insert(array(
		array('userid'=>'1', 'projectid' => 1, 'writepermission'=> 1), 
		array('userid'=>'1', 'projectid' => 2, 'writepermission'=> 1),
		));
	}

}
