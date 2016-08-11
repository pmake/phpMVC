<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_at_ip');
            $table->string('updated_at_ip');
            $table->string('name', 60)->unique();
            $table->string('title', 60);
            $table->string('discribing');
            $table->unsignedInteger('price');
            $table->unsignedInteger('categoryID');
            $table->unsignedInteger('brandID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
