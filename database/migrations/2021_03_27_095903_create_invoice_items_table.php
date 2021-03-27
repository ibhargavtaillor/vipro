<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments("iInvoiceItemId");
            $table->integer("iInvoiceMasterId")->unsigned();
            $table->string("vItemTitle");
            $table->string("vHSN")->nullable();
            $table->integer("iQty");
            $table->double("dRate");
            $table->double("dAmount");

            $table->integer("iUpdatedAt")->nullable();
            $table->integer("iCreatedAt")->nullable();
            $table->integer("iDeletedAt")->nullable();

            $table->foreign("iInvoiceMasterId")->references("iInvoiceMasterId")->on("invoice_master")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
