<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('tipo_id')->unsigned();
            $table->string('Nombres');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('Imagen');
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
