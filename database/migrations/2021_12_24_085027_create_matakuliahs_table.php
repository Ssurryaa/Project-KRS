<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_matakuliah');
            $table->string('semester');
            $table->integer('sks');
            $table->foreignId('prodi_id')->constrained('prodis');
            $table->foreignId('dosen_id')->constrained('dosens');
            $table->enum('status_mk',['Wajib','Pilihan']);
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
        Schema::dropIfExists('matakuliahs');
    }
}
