<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('campaign_id')->unsigned();
			$table->foreign('campaign_id')->references('id')->on('campaign')->onDelete('cascade')->onUpdate('cascade');
			$table->double('nominal', 15, 2)->default('0.0');
			$table->string('name', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('no_telp', 255)->nullable();
			$table->integer('payment_id')->unsigned();
			$table->foreign('payment_id')->references('id')->on('payment')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('kode_unik')->nullable();
			$table->integer('currency');
			$table->integer('anonymous')->default('1')->nullable();
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
        Schema::dropIfExists('donasi');
    }
}
