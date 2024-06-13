<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brandName');
            $table->unsignedBigInteger('second_category_id');
            $table->unsignedBigInteger('main_category_id');
            $table->boolean('is_feature');
            $table->string('OE_No');
            $table->float('price', 8, 2); // Specify precision and scale if needed
            $table->timestamps();

            // Foreign key constraints
            
           // $table->foreign('second_category_id')->references('id')->on('second_categories')->onDelete('cascade');
            $table->foreign('main_category_id')->references('id')->on('main_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
