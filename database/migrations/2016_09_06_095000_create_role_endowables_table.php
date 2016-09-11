<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleEndowablesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('role_endowables', function (Blueprint $table) {
            $table->increments('id');
            //對應到role
            $table->integer('role_id')->unsigned()->index();

            // 對應到 AuthEloquent ex: Admin
            $table->integer('role_endowables_id')->unsigned()->index();
            $table->string('role_endowables_type');

            $table->timestamps();

            //foreign Key Set
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('role_endowables');
    }
}
