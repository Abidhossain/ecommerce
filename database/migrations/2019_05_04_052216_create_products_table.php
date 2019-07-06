<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('product_id'); 
            $table->string('product_name');
            $table->string('product_code');
            $table->tinyInteger('category_id');
            $table->tinyInteger('manufacture_id');
            $table->string('product_size')->nullable();
            $table->string('color')->nullable();
            $table->string('long_desc');
            $table->string('short_desc');
            $table->float('price');
            $table->string('product_image');   
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
        Schema::dropIfExists('products');
    }
}
