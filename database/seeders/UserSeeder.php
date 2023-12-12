<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $user = [
                [
                    'nik' => '3242342342342',
                    'name' => 'masyarakat',
                    'email' => 'masyarakat@gmail.com',
                    'password' => bcrypt('masyarakat123'),
                    'telepon' => '01980193012',
                    'role' => 'masyarakat',
                ],
                [
                    'nik' => '3242342342342',
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin123'),
                    'telepon' => '01980193012',
                    'role' => 'admin',
                ],
                [
                    'nik' => '3242342342342',
                    'name' => 'petugas',
                    'email' => 'petugas@gmail.com',
                    'password' => bcrypt('petugas123'),
                    'telepon' => '01980193012',
                    'role' => 'petugas',
                ],
            ];
         
            foreach($user as $value) {
                User::insert($value);
            }
        }
    }
}
