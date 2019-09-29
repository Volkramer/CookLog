<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_list_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->boolean('check')->default(0);
            $table->bigInteger('shopping_list_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->timestamps();

            $table->foreign('shopping_list_id')->references('id')->on('shopping_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_list_items');
    }
}
