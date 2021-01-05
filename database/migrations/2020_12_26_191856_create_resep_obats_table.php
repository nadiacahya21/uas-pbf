<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_berobat');
            $table->unsignedBigInteger('id_obat');
            $table->timestamps();

            $table->foreign('id_berobat')->references('id')->on('berobats')->onDelete('cascade');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep_obats');
    }
}
