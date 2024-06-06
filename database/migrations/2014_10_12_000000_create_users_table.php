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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->nullable(false);
            $table->unsignedBigInteger('posisi_id')->index();
            $table->string('nama')->nullable(false);
            $table->string('nim');
            $table->string('username')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('recovery_code')->nullable(false);
            $table->timestamps();

            $table->foreign('posisi_id')->references('id')->on('posisis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
