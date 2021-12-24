<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxKrssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_krss', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_ajaran');
            $table->integer('semester');
            $table->enum('nilai', ['Tunda','Terima','A','B','C','D','E']);
            $table->foreignId('matakuliah_id')->constrained('matakuliahs');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas');
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
        Schema::dropIfExists('trx_krss');
    }
}
