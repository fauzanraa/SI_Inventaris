<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'kode' => 'ADM',
                'nama' => 'Admin Jurusan'
            ],
            [
                'id' => 2,
                'kode' => 'URT',
                'nama' => 'Urusan Rumah Tangga'
            ],
            [
                'id' => 3,
                'kode' => 'MHS',
                'nama' => 'Mahasiswa'
            ],
        ];
        DB::table('posisis')->insert($data);
    }
}
