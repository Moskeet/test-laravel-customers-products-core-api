<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('issn');
            $table->string('name');
            $table->string('status');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('uuid')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_customer_id_foreign');
        });
        Schema::dropIfExists('products');
    }
}
