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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('testAdmin'),
            'admin' => true,
            'verified' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'johnny',
            'email' => 'johnnytest.2020a@gmail.com',
            'password' => bcrypt('test1234'),
            'verified' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'phille',
            'email' => 'philippe.asselbergh@gmail.com',
            'password' => bcrypt('test1234'),
            'verified' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'yannis',
            'email' => 'yannisdcl@gmail.com',
            'password' => bcrypt('test1234'),
            'verified' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'lars',
            'email' => 'larsveelearts@gmail.com',
            'password' => bcrypt('test1234'),
            'verified' => 1,
        ]);
    }
}
