<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPaymentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_payment_terms', function (Blueprint $table) {
            $table->increments("iCompanyTermId")->unsigned();
            $table->integer("iCompanyMasterId")->unsigned()->nullable();
            $table->string("vTitle", 255)->nullable();
            $table->tinyInteger("tiIsActive")->default("1")->comment("0 - Inactive, 1 - Active");
            $table->integer("iUpdatedAt")->nullable();
            $table->integer("iCreatedAt")->nullable();
            $table->integer("iDeletedAt")->nullable();

            $table->foreign("iCompanyMasterId")->references("iCompanyMasterId")->on("company_master")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_payment_terms');
    }
}
