<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });

        //實體化一個faker物件
        $fake_data = Faker\Factory::create("zh_TW");
        //使用DB物件的靜態方法table傳回的物件的insert方法將faker產生的假資料寫入資料庫
        for($i=0; $i<10; $i++){
            DB::table("employees")->insert([
                "name" => $fake_data->name,
                "phone_number" => $fake_data->phoneNumber,
                "email" => $fake_data->email
            ]);
        }
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
