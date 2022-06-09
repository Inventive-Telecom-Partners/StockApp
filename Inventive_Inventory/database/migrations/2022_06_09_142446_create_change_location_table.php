<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_location', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idNotif')->index();
            $table->unsignedBigInteger('idUser')->index();
            $table->unsignedBigInteger('idLevel')->index();
            $table->unsignedBigInteger('idElement')->index();
            $table->timestamp('created_at');

            $table->foreign('idNotif')->references('id')->on('notification')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idLevel')->references('id')->on('level')->onDelete('cascade');
            $table->foreign('idElement')->references('id')->on('element')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_location');
    }
}
