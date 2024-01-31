<?php

namespace Database\Seeders;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now();

        // get month from date
        $month = $date->month;

        $startYear = "";
        $endYear = "";

        if($month > 6){

            $startYear = $date->year;
            $endYear = $date->year + 1;

        }else{

            $startYear = $date->year - 1;
            $endYear = $date->year;
        }

        $semester = $startYear. "/" . $endYear;

        // cek apakah semester sudah terdaftar atau belum
        if(!Semester::where("nama", $semester)->exists()){

            // jika tidak ada masukan
            Semester::create([
                "nama" => $semester,
                "aktif" => true,
            ]);
        }
    }
}
