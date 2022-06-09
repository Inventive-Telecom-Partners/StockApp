<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_job', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idNotif')->index();
            $table->unsignedBigInteger('idUser')->index();
            $table->unsignedBigInteger('idJob')->index();
            $table->timestamp('created_at');

            $table->foreign('idNotif')->references('id')->on('notification')->onDelete('cascade');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idJob')->references('id')->on('job')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_job');
    }
}
