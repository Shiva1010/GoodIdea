<?php

use Illuminate\Database\Seeder;

class ItermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iterms')->insert([
            [
                'item_name'=> 'Milk',
            ],
            [
                'item_name'=> 'OliveOli',
            ],
            [
                'item_name'=> 'Wine',
            ],
            [
                'item_name'=> 'Honey',
            ],
            [
                'item_name'=> 'Bread',
            ],
            [
                'item_name'=> 'Cake',
            ],
            [
                'item_name'=> 'Grains',
            ],
            [
                'item_name'=> 'Fruit',
            ],
            [
                'item_name'=> 'Olives',
            ],
            [
                'item_name'=> 'Meat',
            ],
            [
                'item_name'=> 'SweetSmellingHerbs',
            ],
            [
                'item_name'=> 'Rose',
            ],
            [
                'item_name'=> 'OilLamp',
            ],
            [
                'item_name'=> 'Myrrh',
            ],
        ]);
    }
}
