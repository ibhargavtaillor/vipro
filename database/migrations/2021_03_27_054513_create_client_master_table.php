<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_master', function (Blueprint $table) {
            $table->increments("iClientMasterId");
            $table->string("vClientName")->nullable();
            $table->text("txAddress");
            $table->string("vGST");

            $table->tinyInteger("tiIsActive")->default("1")->comment("0 - Inactive, 1 - Active");
            $table->integer("iUpdatedAt")->nullable();
            $table->integer("iCreatedAt")->nullable();
            $table->integer("iDeletedAt")->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_master');
    }
}
