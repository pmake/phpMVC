<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清除資料表所有資料列
        DB::table("products")->truncate();
        DB::table("categories")->truncate();
        DB::table("brands")->truncate();
        
        //逐一執行seeder
        $this->call(productsTableSeeder::class);
        $this->call(categoriesTableSeeder::class);
        $this->call(brandsTableSeeder::class);
    }
}
