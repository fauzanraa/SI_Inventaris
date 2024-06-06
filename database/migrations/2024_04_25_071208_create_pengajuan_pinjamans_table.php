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
            $table->id('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('ruangan_id')->index();
            $table->date('tanggal_mulai')->nullable(false);
            $table->date('tanggal_selesai')->nullable(false);
            $table->string('dokumen_pendukung')->nullable(false);
            $table->string('status_admin')->nullable(false);
            $table->string('status_urt')->nullable(false);
            $table->timestamps();

            // $table->foreign('ruangan_id')->references('id')->on('ruangans');
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
