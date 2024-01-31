<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nuptk = '1234567890';

        if(!User::where("nuptk", $nuptk)->exists()){

            User::create([
                "nohp" => "081355554444",
                "nuptk" => $nuptk,
                "nama" => "Super Admin 1",
                "gender" => "Laki - Laki",
                "pendidikan" => "S1",
                "tempat_lahir" => "Bengkayang",
                "tanggal_lahir" => "2024-01-19",
                "jenis_akun" => "admin",
                "password" => Hash::make("admin123")
            ]);
        }
    }
}
