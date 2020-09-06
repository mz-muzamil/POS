<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 512)->nullable();
            $table->string('contact_person', 512)->nullable();
            $table->string('email', 512)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_whatsApp')->nullable();
            $table->string('status')->nullable();
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->string('country')->nullable();
            $table->string('city', 256)->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
