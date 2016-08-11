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
        $len = count($name);

        for($i=0; $i<$len; $i++){
            $productName = $name[$i];

            DB::table("categories")->insert([
                'name' => $productName,
                'created_at_ip' => $faker->ipv4,
                'updated_at_ip' => $faker->ipv4,
                'created_at' => $faker->date('Y-m-d', 'now'),
                'updated_at' => $faker->date('Y-m-d', 'now')
            ]);
        }
    }
}
