<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password', 255);
            $table->string('lokasi', 255)->nullable();
            $table->string('no_telp', 255)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->longText('biografi')->nullable();
            $table->integer('tipe')->nullable()->default('1');
            $table->integer('role');
            $table->integer('status');
			$table->integer('partner_id')->unsigned()->nullable();
			$table->foreign('partner_id')->references('id')->on('partner')->onDelete('set null')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
