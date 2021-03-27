<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_master', function (Blueprint $table) {
            $table->increments("iInvoiceMasterId");
            $table->string("vUrlKey", 255)->nullable();
            $table->string("vInvoiceNumber", 128)->unique();
            $table->integer("iClientMasterId")->unsigned();
            $table->string("vClientName");
            $table->timestamp("dInvoiceDate")->nullable();
            $table->string("vPaymentTerms")->nullable();
            $table->text("txBillingAddress")->nullable();
            $table->text("txShippingAddress")->nullable();
            $table->text("txTermsAndCondition")->nullable();
            $table->text("txBankDetail")->nullable();
            $table->double("dGrossTotal")->nullable();
            $table->double("dCarting")->nullable();
            $table->double("dTotal")->unsigned();
            $table->double("dSGSTPerc")->unsigned();
            $table->double("dSGST")->unsigned();
            $table->double("dCGSTPerc")->unsigned();
            $table->double("dCGST")->unsigned();
            $table->double("dRoundOff")->unsigned();
            $table->double("dGradTotal")->unsigned();
            $table->integer("iTotalInvoicePrintedCount")->default("0");
            $table->tinyInteger("tiIsPaid")->default("0")->comment("0 - No, 1 - Yes");
            $table->tinyInteger("tiIsActive")->default("1")->comment("0 - Inactive, 1 - Active");
            $table->integer("iUpdatedAt")->nullable();
            $table->integer("iCreatedAt")->nullable();
            $table->integer("iDeletedAt")->nullable();

            $table->foreign("iClientMasterId")->references("iClientMasterId")->on("client_master")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_master');
    }
}
