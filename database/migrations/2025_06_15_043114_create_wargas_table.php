<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_induk');
            $table->string('no_kk');
            $table->string('nama');
            $table->longText('alamat');
            $table->enum('jk', ['L', 'P']);
            $table->string('no_telp')->nullable();
            $table->string('catatan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_baptis')->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->string('tempat_sidhi')->nullable();
            $table->date('tanggal_sidhi')->nullable();
            $table->string('tempat_nikah')->nullable();
            $table->date('tanggal_nikah')->nullable();
            $table->timestamps();

            //relasi ke kelompok
            $table->string('kelompok_id');
            $table->foreign('kelompok_id')->references('kode_kelompok')->on('kelompoks')->cascadeOnUpdate();
            // relasi ke pendidikan
            $table->string('pendidikan_id');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans')->cascadeOnUpdate();
            // relasi ke pekerjaan
            $table->string('pekerjaan_id');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans')->cascadeOnUpdate();
            // relasi ke talenta
            $table->string('talenta_id');
            $table->foreign('talenta_id')->references('id')->on('talentas')->cascadeOnUpdate();
            //relasi ke status warga
            $table->foreignId('status_warga_id')->constrained('status_wargas')->cascadeOnUpdate();
            //relasi ke status nikah
            $table->foreignId('status_nikah_id')->constrained('status_nikahs')->cascadeOnUpdate();
            //relasi ke status keluarga
            $table->foreignId('status_keluarga_id')->constrained('status_keluargas')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
