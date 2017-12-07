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
                'name'        => 'Tea Candle',
                'description' => $faker->text(60),
                'quantity'    => 12,
                'price'       => $faker->randomNumber(2),
                'category_id' => 1
            ],
            [
                'name'        => 'Votive Candle',
                'description' => $faker->text(100),
                'quantity'    => 5,
                'price'       => $faker->randomNumber(2),
                'category_id' => 1
            ],
            [
                'name'        => 'Bracelet',
                'description' => $faker->text(100),
                'quantity'    => 4,
                'price'       => $faker->randomNumber(2),
                'category_id' => 2
            ],
            [
                'name'        => 'Necklace',
                'description' => $faker->text(100),
                'quantity'    => 2,
                'price'       => $faker->randomNumber(2),
                'category_id' => 2
            ],
            [
                'name'        => 'Scarf',
                'description' => $faker->text(90),
                'quantity'    => 2,
                'price'       => $faker->randomNumber(2),
                'category_id' => 3
            ],
            [
                'name'        => 'Potholder',
                'description' => $faker->text(95),
                'quantity'    => 2,
                'price'       => $faker->randomNumber(2),
                'category_id' => 3
            ],
            [
                'name'        => 'Chocolate Chip Cookies',
                'description' => $faker->text(100),
                'quantity'    => 10,
                'price'       => $faker->randomNumber(2),
                'category_id' => 4
            ],
            [
                'name'        => 'Cupcakes',
                'description' => $faker->text(100),
                'quantity'    => 5,
                'price'       => $faker->randomNumber(2),
                'category_id' => 4
            ],
            [
                'name'        => 'Christmas Tree Ornament',
                'description' => $faker->text(100),
                'quantity'    => 12,
                'price'       => $faker->randomNumber(2),
                'category_id' => 5
            ],
            [
                'name'        => 'Picture Frame',
                'description' => $faker->text(100),
                'quantity'    => 8,
                'price'       => $faker->randomNumber(2),
                'category_id' => 5
            ]
        ]);
    }
}
