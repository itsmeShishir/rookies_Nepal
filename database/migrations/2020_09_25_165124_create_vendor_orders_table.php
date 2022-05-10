<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('owner_id')->nullable();
            $table->string('user_email',255);
            $table->string('name',255);
            $table->string('address',255);
            $table->bigInteger('phone');
            $table->float('shipping_charges');
            $table->string('coupon_code');
            $table->integer('coupon_amount');
            $table->string('order_status',255);
            $table->string('payment_method',255);
            $table->float('grand_total');
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
        Schema::dropIfExists('vendor_orders');
    }
}
