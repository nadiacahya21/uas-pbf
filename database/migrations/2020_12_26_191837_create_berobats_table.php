<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerobatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berobats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_dokter');
            $table->string('keluhan')->nullable();
            $table->string('diagnosa')->nullable();
            $table->enum('penatalaksanaan', ['rawat jalan','rawat inap','rujuk','lainnya'])->nullable();
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berobats');
    }
}
