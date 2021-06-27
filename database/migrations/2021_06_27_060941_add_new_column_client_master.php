<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnClientMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_master', function (Blueprint $table) {
            $table->tinyInteger("tiIsOutOfState")->comment("0 in state, 1 - out state")->after("vGST")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_master', function (Blueprint $table) {
            $table->dropColumn("tiIsOutOfState");
        });
    }
}
