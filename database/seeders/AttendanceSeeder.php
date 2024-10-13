<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //
        $AttData = [   
            [
                "id_employees"=>"1",
                "id_users"=>"1",
                "date"=>"2024-05-03",
                // "status"=>"",
            ],
            [
                "id_employees"=>"2",
                "id_users"=>"1",
                "date"=>"2024-05-03",
                // "status"=>"",
            ],
            [
                "id_employees"=>"3",
                "id_users"=>"1",
                "date"=>"2024-05-03",
                // "status"=>"",
            ],
            [
                "id_employees"=>"4",
                "id_users"=>"1",
                "date"=>"2024-05-03",
                // "status"=>"",
            ],
        ];
            

            //untuk memasukkan data
            foreach ($AttData as $key => $value) {
                Attendance::create($value);
         }
    }
}
