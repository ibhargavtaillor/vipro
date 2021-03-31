<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCompanyMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_master', function (Blueprint $table) {
            $table->bigInteger('iAdminId')->unsigned()->after("iCompanyMasterId");
            $table->foreign("iAdminId")->references("id")->on("admins")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_master', function (Blueprint $table) {
            $table->dropColumn("iAdminId");
        });
    }
}
