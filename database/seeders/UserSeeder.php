<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data = [
        [
          'id' => '1',
          'posisi_id' => '1',  
          'nama' => 'admin',
          'nim' => '',
          'username' => 'admin',
          'password' => Hash::make('admin'),
          'recovery_code' => '12345',
        ],
        [
          'id' => '2',
          'posisi_id' => '2',  
          'nama' => 'urusan rumah tangga',
          'nim' => '',
          'username' => 'urt',
          'password' => Hash::make('urt'),
          'recovery_code' => '12345',
        ],
      ];
      DB::table('users')->insert($data);  
    }
}
