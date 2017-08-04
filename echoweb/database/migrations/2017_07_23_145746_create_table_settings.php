<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
			$table->string('meta_name', 255);
            $table->integer('pages_id')->unsigned()->nullable();
			$table->foreign('pages_id')->references('id')->on('pages')->onDelete('cascade')->onUpdate('cascade');
			$table->string('url', 255)->nullable();
			$table->string('gambar', 255)->nullable();
			$table->longText('konten')->nullable();
			$table->integer('tipe')->nullable();
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
         Schema::dropIfExists('settings');
    }
}
