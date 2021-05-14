<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIntendedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_intended', function (Blueprint $table) {
            $table->primary(['product_id', 'intended_id']);
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('intended_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->foreign('intended_id')
                ->references('id')
                ->on('intendeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_intended');
    }
}
