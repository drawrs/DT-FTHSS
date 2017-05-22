<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRekap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sekolah_id');
            $table->integer('jml_gty');
            $table->integer('jml_pty');
            $table->string('ket');
            $table->string('tahun');
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
        Schema::drop('rekap');
    }
}
