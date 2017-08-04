<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOfflineDonasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offline_donasi', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('campaign_id')->unsigned();
			$table->foreign('campaign_id')->references('id')->on('campaign')->onDelete('cascade')->onUpdate('cascade');
			$table->double('nominal', 15, 2)->default('0.0');
			$table->string('name', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('no_telp', 255)->nullable();
			$table->integer('currency');
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
        Schema::dropIfExists('offline_donasi');
    }
}
