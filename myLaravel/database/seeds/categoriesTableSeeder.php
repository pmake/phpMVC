<?php

use Illuminate\Database\Seeder;

class categoriesTableSeeder extends Seeder
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

        for($i=0; $i<10; $i++){
            $productName = $name[$faker->numberBetween(0,2)];

            DB::table("products")->insert([
                'name' => $productName,
                'created_at_ip' => $faker->ipv4,
                'updated_at_ip' => $faker->ipv4,
                'created_at' => $faker->date('Y-m-d', 'now'),
                'updated_at' => $faker->date('Y-m-d', 'now')
            ]);
        }
    }
}
