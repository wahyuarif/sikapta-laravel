<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBimbingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kd_bimbingan');
            $table->integer('pengajuan_id')->unsigned();
            $table->foreign('pengajuan_id')
                ->references('id')
                ->on('pengajuans')
                ->onDelete('cascade');
            $table->integer('dosen_id')->unsigned();
            $table->foreign('dosen_id')
                ->references('id')
                ->on('dosens')
                ->onDelete('cascade');
            $table->integer('mahasiswa_id')->unsigned();
            $table->foreign('mahasiswa_id')
                ->references('id')
                ->on('mahasiswas')
                ->onDelete('cascade');
            $table->integer('bab')->nullable();
            $table->string('file_bimbingan')->nullable();
            $table->string('bahasan')->nullable();
            $table->date('tgl_bimbingan')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('bimbingans');
    }
}
