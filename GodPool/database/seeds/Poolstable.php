<?php

use Illuminate\Database\Seeder;

class Poolstable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pools')->insert([
            [
                'pool_name' => 'pool01',
            ],
            [
                'pool_name' => 'pool02',
            ],
            [
                'pool_name' => 'pool03',
            ],
            [
                'pool_name' => 'pool04',
            ],
            [
                'pool_name' => 'pool05',
            ],
            [
                'pool_name' => 'pool06',
            ],
            [
                'pool_name' => 'pool07',
            ],
            [
                'pool_name' => 'pool08',
            ],
            [
                'pool_name' => 'pool09',
            ],
            [
                'pool_name' => 'pool10',
            ],
        ]);
    }
}
