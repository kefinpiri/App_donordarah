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
        Schema::create('distribusi_darahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permintaan_darah_id')
                ->constrained('permintaan_darahs')
                ->onDelete('cascade');
            $table->foreignId('petugas_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('golongan_darah');

            $table->integer('jumlah_kantong');

            $table->date('tanggal_distribusi');

            $table->enum('status', [
                'Diproses',
                'Dikirim',
                'Selesai',
                'Ditolak'
            ])->default('Diproses');

            $table->text('catatan')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusi_darahs');
    }
};
