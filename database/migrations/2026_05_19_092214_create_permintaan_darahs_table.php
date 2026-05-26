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
        Schema::create('permintaan_darahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            $table->string('no_hp');
            $table->string('golongan_darah');

            $table->integer('jumlah_kantong');

            $table->string('rumah_sakit');

            $table->date('tanggal_permintaan');

            $table->enum('status', [
                'pending',
                'disetujui',
                'ditolak'
            ])->default('pending');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_darahs');
    }
};
