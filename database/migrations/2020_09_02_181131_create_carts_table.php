<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('user_id')->nullable();
            $table->integer('product_owner_id')->nullable();
            $table->string('product_name',255);
            $table->string('product_code',255);
            $table->string('product_color',255);
            $table->string('product_price',255);
            $table->string('sku',255)->nullable();
            $table->string('product_size',255);
            $table->integer('product_quantity');
            $table->integer('total_price');
            $table->string('user_email',255);
            $table->string('session_id',255);
            $table->integer('buy_now_status')->nullable()->default(0);
            $table->integer('product_attr_id')->nullable();
            $table->integer('has_tax')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
