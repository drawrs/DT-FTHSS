<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_guru', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sekolah_id');
            $table->integer('tugas_id');
            $table->string('nama');
            $table->enum('jk', ['L', 'P']);
            $table->integer('tmp_lahir_id');
            $table->string('prog');
            $table->string('jurusan');
            $table->string('pejabat');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->date('tmt_kerja');
            $table->enum('status', ['GTY', 'PTY']);
            $table->string('nuptk');
            $table->string('no_sertifikasi');
            $table->string('no_nrg');
            $table->enum('status_guru', ['aktif', 'mutasi', 'nonaktif']);
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
        Schema::drop('data_guru');
    }
}
