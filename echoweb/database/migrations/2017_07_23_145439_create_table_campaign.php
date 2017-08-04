<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->string('judul', 255);
			$table->double('target_dana', 15, 2)->default('0.0');
			$table->string('link_campaign', 255);
			$table->dateTime('deadline')->nullable();
			$table->integer('kategori_id')->unsigned();
			$table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
			$table->string('lokasi', 255);
			$table->string('gambar', 255);
			$table->string('video', 255)->nullable();
			$table->string('short_desc', 255);
			$table->longText('long_desc');
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
        Schema::dropIfExists('campaign');
    }
}
