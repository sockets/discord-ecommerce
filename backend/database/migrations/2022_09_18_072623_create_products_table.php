<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name', 100);
            $table->string('description', 500);
            $table->double('price', 10, 2);
            $table->boolean('status')->default(1);
            $table->string('stripe_product', 100);
            $table->string('stripe_price', 100);
            $table->integer('stock')->default(0);
            $table->integer('type')->unsigned()->nullable();
            $table->foreign('type')->references('id')
                ->on('product_types')
                ->onUpdate('cascade')
                ->onDelete('set null');
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
};
