<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');  // Define as unsigned big integer
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');  // Add foreign key constraint
            $table->integer('subprice');
            $table->integer('totalprice');
            $table->integer('quantity');
            $table->integer('deliveryfees');
            $table->text('note');
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
        Schema::dropIfExists('order_items');
    }
}
