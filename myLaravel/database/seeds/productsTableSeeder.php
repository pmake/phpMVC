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
        $fake_data = Faker\Factory::create('zh_TW');

        DB::table("products")->insert([
            "name" => $fake_data->name,
            "discribing" => $fake_data->realText($maxNbChars = 200, $indexSize = 2)
        ]);
    }
}
