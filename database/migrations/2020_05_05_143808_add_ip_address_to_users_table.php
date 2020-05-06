<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('logged_in_at')->nullable()->after('ip_address');
            $table->timestamp('logged_out_at')->nullable()->after('logged_in_at');
            $table->index('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ip_address');
            $table->dropColumn('logged_in_at');
            $table->dropColumn('logged_out_at');



        });
    }
}
