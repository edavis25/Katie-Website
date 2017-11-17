<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('products')->insert([
            [
                'name' => 'Tea Candle',
                'description' => $faker->text(60),
                'quantity' => 12,
                'price' => $faker->randomNumber(2),
                'category_id' => 1
            ],
            [
                'name' => 'Votive Candle',
                'description' => $faker->text(100),
                'quantity' => 5,
                'price' => $faker->randomNumber(2),
                'category_id' => 1
            ]
        ]);
    }
}
