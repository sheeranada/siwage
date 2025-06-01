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
            $table->string('no_induk')->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->enum('jk', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tempat_baptis')->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->string('tempat_sidhi')->nullable();
            $table->date('tanggal_sidhi')->nullable();
            $table->string('tempat_menikah')->nullable();
            $table->date('tanggal_menikah')->nullable();
            $table->timestamps();

            $table->foreignUuid('keluarga_id')->nullable()->constrained('keluargas')->cascadeOnUpdate();
            $table->foreignUuid('talenta_id')->constrained('talentas')->cascadeOnUpdate();
            $table->foreignUuid('pendidikan_id')->constrained('pendidikans')->cascadeOnUpdate();
            $table->foreignUuid('pekerjaan_id')->constrained('pekerjaans')->cascadeOnUpdate();
            $table->foreignUuid('status_keluarga_id')->constrained('status_keluargas')->cascadeOnUpdate();
            $table->foreignUuid('status_warga_id')->constrained('status_wargas')->cascadeOnUpdate();
            $table->foreignUuid('status_nikah_id')->constrained('status_nikahs')->cascadeOnUpdate();
            $table->string('code_from_keluargas');
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
