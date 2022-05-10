<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name',255);
            $table->string('code',255);
            $table->integer('category_id');
            $table->string('color',255);
            $table->string('description',6000);  
            $table->string('detail',6000);  
            $table->integer('price')->nullable();
            $table->integer('tax_amount')->nullable();
            $table->integer('has_tax')->default(0);
            $table->integer('total_price')->nullable();
            $table->integer('discounted_price')->nullable();
            $table->integer('vendor_price')->nullable();
            $table->string('image',255);
            $table->integer('status')->default(1);
            $table->integer('featured')->default(1);
            $table->integer('day_deal')->default(0);
            $table->integer('has_attribute')->default(0);
            $table->integer('stock')->default(0);
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
