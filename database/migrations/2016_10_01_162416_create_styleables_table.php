<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStyleablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styleables', function (Blueprint $table) {
            $table->increments('id');
            //對應到style
            $table->integer('style_id')->unsigned()->index();

            // 對應到 Eloquent ex: Category
            $table->integer('styleables_id')->unsigned()->index();
            $table->string('styleables_type');

            $table->timestamps();

            //foreign Key Set
            $table->foreign('style_id')->references('id')->on('styles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('styleables');
    }
}
