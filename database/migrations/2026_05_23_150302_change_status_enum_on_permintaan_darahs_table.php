<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE permintaan_darahs
            MODIFY status ENUM(
                'Pending',
                'Diproses',
                'Disetujui',
                'Ditolak'
            ) DEFAULT 'Pending'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE permintaan_darahs
            MODIFY status ENUM(
                'pending',
                'diproses',
                'selesai'
            ) DEFAULT 'pending'
        ");
    }
};
