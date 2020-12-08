<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaprodisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kaprodis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dosen_id')->unsigned();
            $table->foreign('dosen_id')
                ->references('id')
                ->on('dosens')
                ->onDelete('cascade');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')
                ->references('id')
                ->on('prodis')
                ->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('kaprodis');
    }
}
