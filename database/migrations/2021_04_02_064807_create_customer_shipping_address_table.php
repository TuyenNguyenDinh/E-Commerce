<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_shipping_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_province');
            $table->unsignedBigInteger('id_district');
            $table->string('address_detail',100);
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('id_province')->references('id')->on('province')->onDelete('cascade');
            $table->foreign('id_district')->references('id')->on('district')->onDelete('cascade');
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
        Schema::dropIfExists('customer_shipping_address');
    }
}
