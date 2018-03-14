<?php

use Illuminate\Database\Seeder;

class SlotTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shedules')->insert([
            'slot' => '2018-03-25 19:00:00',
            'user_id' => 1,
            'ad_id' => 1,
            'order_id' => 1,
        ]);

        DB::table('shedules')->insert([
            'slot' => '2018-03-25 19:00:00',
            'user_id' => 1,
            'ad_id' => 1,
            'order_id' => 1,
        ]);
    }
}
