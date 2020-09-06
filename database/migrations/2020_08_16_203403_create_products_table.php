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
            $table->increments('id');
            $table->string('product_name', 512)->nullable();
            $table->string('supplier_id', 128)->nullable();
            $table->bigInteger('product_price');
            $table->date('purchase_date');
            $table->string('product_quantity', 128)->nullable();
            $table->bigInteger('total_amount');
            $table->bigInteger('amount_paid');
            $table->bigInteger('amount_due');
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
