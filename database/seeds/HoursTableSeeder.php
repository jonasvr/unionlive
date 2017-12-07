
<?php

use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hours')->insert([
            'timeSlot' => '19:00'
        ]);

        DB::table('hours')->insert([
            'timeSlot' => '20:00'
        ]);

        DB::table('hours')->insert([
            'timeSlot' => '21:00'
        ]);

        DB::table('hours')->insert([
            'timeSlot' => '22:00'
        ]);
    }
}
