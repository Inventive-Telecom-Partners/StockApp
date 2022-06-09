<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element', function (Blueprint $table) {
            $table->id();
            $table->string('Serial_Number');
            $table->string('Product_Number');
            $table->string('Description');
            $table->string('color');
            $table->date('perish_at');
            $table->float('Price exVAT');
            $table->boolean('favori');
            $table->unsignedBigInteger('idBrand')->index();
            $table->unsignedBigInteger('idCategory')->index();

            $table->foreign('idBrand')->references('id')->on('brand')->onDelete('cascade');
            $table->foreign('idCategory')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('element');
    }
}
