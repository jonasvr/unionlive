<?php

use Illuminate\Database\Seeder;

class AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i<10 ;$i++)
    	{
    		DB::table('ad')->insert([
            	'title' => str_random(10),
            	'user_id' => 1,
            	'path_audio' => "test",
            	'path_art' => "test",
        	]);
    	}
    }
}
