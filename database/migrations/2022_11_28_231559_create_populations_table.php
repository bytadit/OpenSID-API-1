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
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik', 16)->unique();
            $table->foreignId('kk_id');
            // $table->string('kk_level');
            // $table->foreignId('rtm_id');
            // $table->string('rtm_level');
            $table->foreignId('dusun_id');
            $table->foreignId('sex_id');
            // $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            // $table->foreignId('religion_id');
            // $table->foreignId('pendidikan_kk_id');
            // $table->foreignId('pendidikan_sedang_id');
            // $table->foreignId('job_id');
            // $table->foreignId('married_id');
            $table->foreignId('citizen_id');
            // $table->string('dokumen_passport');
            // $table->string('dokumen_kitas');
            // $table->string('ayah_nik');
            // $table->string('ibu_nik');
            // $table->string('nama_ayah');
            // $table->string('nama_ibu');
            // $table->string('foto');
            $table->foreignId('blood_type_id');
            // $table->string('cluster_id');
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
        Schema::dropIfExists('populations');
    }
};
