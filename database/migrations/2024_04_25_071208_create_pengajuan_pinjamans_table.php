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
        Schema::create('pengajuan_pinjamans', function (Blueprint $table) {
            $table->id('id')->nullable(false);
            $table->unsignedBigInteger('user_id')->index();
            $table->date('tanggal_pinjam')->nullable(false);
            $table->date('tanggal_selesai')->nullable(false);
            $table->string('dokumen_pendukung')->nullable(false);
            $table->string('status')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pinjamans');
    }
};
