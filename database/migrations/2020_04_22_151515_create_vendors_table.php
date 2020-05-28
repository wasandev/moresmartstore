<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable()->default(false);
            $table->enum('type', ['company', 'person'])->nullable()->default('company');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('taxid', 13)->nullable();
            $table->string('name', 250)->unique();
            $table->string('address')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 5)->nullable();
            $table->string('country')->nullable()->default('thailand');
            $table->longText('description')->nullable();
            $table->string('contractname', 200)->nullable();
            $table->string('phoneno', 10)->nullable();
            $table->string('weburl')->nullable();
            $table->string('facebook')->nullable();
            $table->string('line')->nullable();
            $table->string('email')->nullable();
            $table->string('imagefile')->default('store.jpg');
            $table->string('logofile')->default('storelogo.png');
            $table->string('location_lat')->nullable();
            $table->string('location_lng')->nullable();
            $table->bigInteger('businesstype_id')->unsigned()->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
