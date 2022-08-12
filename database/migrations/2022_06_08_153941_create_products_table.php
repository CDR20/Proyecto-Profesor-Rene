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
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('slug');
            $table->float('shop_price');
            $table->float('provider_price');
            $table->unsignedInteger('stock');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('inversor_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('inversor_id')->references('id')->on('users')->onDelete('cascade');;
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