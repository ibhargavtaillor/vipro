<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->integer("iUpdatedAt")->nullable();
            $table->integer("iCreatedAt")->nullable();
        });

        $rows = [
            array(
                'name' => 'Admin',
                'email' => 'admin@vipro.com',
                'password' => '$2y$10$Vz7TTJ913ihGErJMDj42Aeh7EuU3ZodJJ89hfvZF/CLiHXWRJ4WU2',
                'iCreatedAt' => time(),
                'iUpdatedAt' => time(),
            ),
        ];

        \DB::table('admins')->insert($rows);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
