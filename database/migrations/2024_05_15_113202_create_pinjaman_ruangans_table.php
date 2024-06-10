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
        Schema::create('pinjaman_ruangans', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('pengajuan_pinjaman_id')->index();
            $table->date('tanggal_approval')->nullable(false);
            $table->string('catatan')->nullable(true);
            $table->timestamps();

            $table->foreign('pengajuan_pinjaman_id')->references('id')->on('pengajuan_pinjamans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman_ruangans');
    }
};
