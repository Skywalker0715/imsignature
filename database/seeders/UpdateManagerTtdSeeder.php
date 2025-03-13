<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use Illuminate\Database\Seeder;


class UpdateManagerTtdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = User::where('role', 'manager')->first();

        if ($manager) {
            $manager->ttd_digital = 'images/ttd.jpg'; 
            $manager->save();
        }
    }
}
