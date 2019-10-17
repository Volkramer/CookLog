<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_list_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->integer('quantity')->unsigned();
            $table->dateTime('dlc_dluo_date')->nullable();
            $table->boolean('dlc_dluo_toggle')->default(0);
            $table->bigInteger('stock_list_id')->unsigned();
            $table->foreign('stock_list_id')->references('id')->on('stock_lists')->onDelete('cascade');
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
        Schema::dropIfExists('stock_list_items');
    }
}
