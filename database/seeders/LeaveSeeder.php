<?php

namespace Database\Seeders;

use App\Models\Leave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $leaveData = [   
            [
                // "id_users"=>"1",
                "id_employees"=>"1",
                "start_date"=>"2024-04-06",
                "end_date"=>"2024-04-10",
                "description"=>"Sick",
                "responsible_person"=>"Gabby Fortuna",
                // "status"=>"",
            ],
            [
                // "id_users"=>"2",
                "id_employees"=>"2",
                "start_date"=>"2024-04-06",
                "end_date"=>"2024-04-11",
                "description"=>"Holiday",
                "responsible_person"=>"Gabby Fortuna",
                // "status"=>"",
            ],
            [
                // "id_users"=>"1",
                "id_employees"=>"1",
                "start_date"=>"2024-05-05",
                "end_date"=>"2024-05-09",
                "description"=>"Sick",
                "responsible_person"=>"Gabby Fortuna",
                // "status"=>"",
            ],
            [
                // "id_users"=>"1",
                "id_employees"=>"3",
                "start_date"=>"2024-05-05",
                "end_date"=>"2024-05-09",
                "description"=>"Pelatihan",
                "responsible_person"=>"Andi Hermawan",
                // "status"=>"",
            ],
            [
                // "id_users"=>"1",
                "id_employees"=>"3",
                "start_date"=>"2024-05-12",
                "end_date"=>"2024-05-15",
                "description"=>"Holiday",
                "responsible_person"=>"Maulana Razaq Azziqri",
                // "status"=>"",
            ],
            [
                // "id_users"=>"1",
                "id_employees"=>"4",
                "start_date"=>"2024-05-16",
                "end_date"=>"2024-05-17",
                "description"=>"Holiday",
                "responsible_person"=>"Gabby Fortuna",
                // "status"=>"",
            ],
            [
                // "id_users"=>"1",
                "id_employees"=>"1",
                "start_date"=>"2024-06-03",
                "end_date"=>"2024-06-04",
                "description"=>"Holiday",
                "responsible_person"=>"Andi Hermawan",
                // "status"=>"",
            ],
            [
                // "id_users"=>"1",
                "id_employees"=>"4",
                "start_date"=>"2024-06-07",
                "end_date"=>"2024-06-08",
                "description"=>"Holiday",
                "responsible_person"=>"Gabby Fortuna",
                // "status"=>"",
            ],
            
        ];
        //untuk memasukkan data
        foreach ($leaveData as $key => $value) {
            Leave::create($value);
        }
    }
    
}
