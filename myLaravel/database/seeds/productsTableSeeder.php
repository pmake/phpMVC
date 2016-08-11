<?php

use Illuminate\Database\Seeder;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("zh_TW");
        $name = ["jeans", "clothes", "hat"];
        //$price = [399, 499, 599];

        for($i=0; $i<10; $i++){
            $no = $faker->ean8;
            $productName = $name[$faker->numberBetween(0,2)];

            DB::table("products")->insert([
                'name' => "$productName-$no",
                'title' => "$productName-$no", 
                'discribing' => $faker->realText(200), 
                'price' => $faker->numberBetween(399, 899),
                'categoryID' => 1,
                'brandID' => 1,
                'created_at_ip' => $faker->ipv4,
                'updated_at_ip' => $faker->ipv4,
                'created_at' => $faker->date('Y-m-d', 'now'),
                'updated_at' => $faker->date('Y-m-d', 'now'),
            ]);
        }
    }
}
