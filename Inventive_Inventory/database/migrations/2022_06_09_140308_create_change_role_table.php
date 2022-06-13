<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser')->index();
            $table->unsignedBigInteger('idRole')->index();
            $table->timestamp('created_at');

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idRole')->references('id')->on('role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_role');
    }
}
