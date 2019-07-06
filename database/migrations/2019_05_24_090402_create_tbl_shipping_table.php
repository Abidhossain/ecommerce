<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->bigIncrements('shipping_id');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_country');
            $table->string('shipping_city'); 
            $table->string('shipping_thana');
            $table->string('shipping_village');
            $table->string('shipping_street_no');
            $table->string('shipping_house_no');
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
        Schema::dropIfExists('tbl_shipping');
    }
}
