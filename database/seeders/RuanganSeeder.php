<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
          'id' => '1',  
          'kode' => 'RT1',
          'nama' => 'Ruang Teori 1',
          // 'foto' => '',
          'lantai' => '5', 
        ],
        [
          'id' => '2',  
          'kode' => 'RT2',
          'nama' => 'Ruang Teori 2',
          // 'foto' => '',
          'lantai' => '5', 
        ],
        [
          'id' => '3',  
          'kode' => 'RT3',
          'nama' => 'Ruang Teori 3',
          // 'foto' => '',
          'lantai' => '5', 
        ],
        [
          'id' => '4',  
          'kode' => 'LPR1',
          'nama' => 'Lab Proyek 1',
          // 'foto' => '',
          'lantai' => '6', 
        ],
        [
          'id' => '5',  
          'kode' => 'LPR2',
          'nama' => 'Lab Proyek 2',
          // 'foto' => '',
          'lantai' => '6', 
        ],
        [
          'id' => '6',  
          'kode' => 'LPR3',
          'nama' => 'Lab Proyek 3',
          // 'foto' => '',
          'lantai' => '6', 
        ],
        [
          'id' => '7',  
          'kode' => 'RP1',
          'nama' => 'Ruang Pemrograman 1',
          // 'foto' => '',
          'lantai' => '7', 
        ],
        [
          'id' => '8',  
          'kode' => 'RP2',
          'nama' => 'Ruang Pemrograman 2',
          // 'foto' => '',
          'lantai' => '7', 
        ],
        [
          'id' => '9',  
          'kode' => 'RP3',
          'nama' => 'Ruang Pemrograman 3',
          // 'foto' => '',
          'lantai' => '7', 
        ],
        [
          'id' => '10',  
          'kode' => 'ADT',
          'nama' => 'Ruang Auditorium',
          // 'foto' => '',
          'lantai' => '8', 
        ],
      ];
      DB::table('ruangans')->insert($data); 
    }
}
