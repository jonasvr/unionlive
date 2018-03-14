<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(HoursTableSeeder::class);
         $this->call(DaysTableSeeder::class);
//         $this->call(SlotTestSeeder::class);
    }
}
