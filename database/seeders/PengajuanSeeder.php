<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1,
                'ruangan_id' => '2',
                'tanggal_mulai' => '2024-05-19',
                'tanggal_selesai' => '2024-05-19',
                'dokumen_pendukung' => 'a',
                'status_admin' => 'Dikonfirmasi',
                'status_urt' => 'Dikonfirmasi',
            ],
            [
                'user_id' => 2,
                'ruangan_id' => '4',
                'tanggal_mulai' => '2024-05-20',
                'tanggal_selesai' => '2024-05-21',
                'dokumen_pendukung' => 'a',
                'status_admin' => 'Menunggu',
                'status_urt' => 'Menunggu',
            ],
        ];
        DB::table('pengajuan_pinjamans')->insert($data);
    }
}
