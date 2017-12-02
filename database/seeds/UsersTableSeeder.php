<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'johnny',
            'email' => 'johnnytest.2020a@gmail.com',
            'password' => bcrypt('test1234'),
            'verified' => 1,
        ]);
    }
}
