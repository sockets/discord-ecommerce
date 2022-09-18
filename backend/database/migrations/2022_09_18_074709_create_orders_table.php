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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer')->unsigned()->nullable();
            $table->foreign('customer')->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('billing_email')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_card_last4')->nullable();
            $table->string('billing_name_on_card')->nullable();
            $table->string('billing_card_type')->nullable();
            $table->string('stripe_customer');
            $table->string('stripe_intent');
            $table->double('discount')->default(0);
            $table->string('discount_code')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('tax')->nullable();
            $table->double('total')->nullable();
            $table->double('total_paid')->nullable();
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
};
