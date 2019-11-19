<?php

use Illuminate\Database\Seeder;

class Drinkstable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert([
            [
                'd_name' => 'RedWater',
            ],
            [
                'd_name' => 'BlueWater',
            ],
            [
                'd_name' => 'RedWater',
            ],
        ]);
    }
}
