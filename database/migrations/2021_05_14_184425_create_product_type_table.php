<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type', function (Blueprint $table) {
            $table->primary(['product_id', 'type_id']);
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->foreign('type_id')
                ->references('id')
                ->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_type');
    }
}
