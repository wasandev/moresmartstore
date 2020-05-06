<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveAndDetailFieldToBusinesstypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesstypes', function (Blueprint $table) {
            $table->boolean('active')->nullable()->default(true);
            $table->text('description')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesstypes', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('description');
        });
    }
}
