<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->boolean('status')->nullable()->default(true);
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('name', 255)->unique();
            $table->text('description');
            $table->double('price', 8, 2)->nullable()->default(0.00);
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
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
}
