<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData  = [
            [
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'divisi' => 'ICT',
            'jabatan' => 'admin',
            'role' => 'admin',
            'nomor_telepon' => '0812345678',
            'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Manager',
                'email' => 'manager@gmail.com',
                'divisi' => 'ICT',
                'jabatan' => 'manager',
                'role' => 'manager',
                'nomor_telepon' => '0890712345',
                'password' => bcrypt('123456'),
                ],
            
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    

    }
}
