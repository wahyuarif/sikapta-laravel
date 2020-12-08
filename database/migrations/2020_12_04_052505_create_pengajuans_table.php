<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->increments('id');
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
            $table->string('no_pengajuan');
            $table->string('judul');
            $table->string('bidang_pekerjaan');
            $table->string('deskripsi');
            $table->integer('jml_pegawai');
            $table->enum('jns_pengajuan',['KP','TA']);
            $table->string('kompleksitas_pekerjaan');
            $table->string('lokasi');
            $table->string('nm_instansi');
            $table->string('phone');
            $table->string('kerangka_pikir');
            $table->string('status');
            $table->string('syarat')->nullable();
            $table->integer('selesai');
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
        Schema::dropIfExists('pengajuans');
    }
}
