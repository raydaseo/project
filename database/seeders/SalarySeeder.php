<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $salaryData = [   
            [
                "id_employees" => "1",
                "salary" => "1000000",
                "bonus" => "200000",
                "date" => "2024-04-01",
                "total" => '1200000',
            ],
            [
                "id_employees" => "2",
                "salary" => "1000000",
                "bonus" => "100000",
                "date" => "2024-05-01",
                "total" => '1100000',
            ],
            [
                "id_employees" => "3",
                "salary" => "1000000",
                "bonus" => "0",
                "date" => "2024-05-01",
                "total" => '1100000',
            ],
            [
                "id_employees" => "1",
                "salary" => "1000000",
                "bonus" => "200000",
                "date" => "2024-05-01",
                "total" => '1200000',
            ],
            
        ];
        //untuk memasukkan data
        foreach ($salaryData as $key => $value) {
            Salary::create($value);
        }
    }
}
