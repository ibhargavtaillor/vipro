<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInvoiceMasterIgst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_master', function (Blueprint $table) {
            $table->double("dIGSTPerc")->after("dCGST")->default(0)->nullable();
            $table->double("dIGST")->after("dIGSTPerc")->default(0)->nullable();
            $table->double("tiIsOutOfState")->after("tiIsPaid")->default(0)->comment("0 in state, 1 - out state");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_master', function (Blueprint $table) {
            $table->dropColumn("tiIsOutOfState");
            $table->dropColumn("dIgst");
            $table->dropColumn("dIgstPerc");
        });
    }
}
