<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pengajuan_pinjaman_id' => 2,
                'tanggal_approval' => '2024-05-18',
            ]  
            ];
        DB::table('pinjaman_ruangans')->insert($data);  
    }
}
