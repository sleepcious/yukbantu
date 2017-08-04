<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIsisaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isisaku', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->double('nominal', 15, 2)->default('0.0');
			$table->integer('payment_id')->unsigned();
			$table->foreign('payment_id')->references('id')->on('payment')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('kode_unik');
			$table->integer('currency')->default('1');
			$table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isisaku');
    }
}
