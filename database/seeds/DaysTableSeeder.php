
<?php

use Illuminate\Database\Seeder;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'day' => 'Sunday'
        ]);

        DB::table('days')->insert([
            'day' => 'Monday'
        ]);

        DB::table('days')->insert([
            'day' => 'Tuesday'
        ]);

        DB::table('days')->insert([
            'day' => 'Wednesday'
        ]);

        DB::table('days')->insert([
            'day' => 'Thursday'
        ]);
        
        DB::table('days')->insert([
            'day' => 'Friday'
        ]);

        DB::table('days')->insert([
            'day' => 'Saturday'
        ]);

    }
}
