<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class Employeeseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $employeeData = [   
            [
                "id"=>"1",
                "name"=>"Maulana Razaq Azziqri",
                "position"=>"Freelance",
                "dob"=>"1996-09-08",
                "telephone"=>"082146207010",
                "username"=>"maulana",
                "password"=>bcrypt('123456'),
                "photo"=>""
            ],
            [
                'id'=> '2',
                "name"=>"Nurika Rahmawati",
                "position"=>"Administrator",
                "dob"=>"1996-12-22",
                "telephone"=>"082210521158",
                "username"=>"Nurika",
                "password"=>bcrypt('123456'),
                "photo"=>""
            ],
            [
                "id"=>"3",
                "name"=>"Gabby Fortuna",
                "position"=>"Freelance",
                "dob"=>"1998-04-19",
                "telephone"=>"089842984426",
                "username"=>"gabby",
                "password"=>bcrypt('123456'),
                "photo"=>""
            ],
            [
                "id"=>"4",
                "name"=>"Andi Hermawan",
                "position"=>"Tutor",
                "dob"=>"1996-02-06",
                "telephone"=>"081285543912",
                "username"=>"andi",
                "password"=>bcrypt('123456'),
                "photo"=>""
            ],
            
        ];
        //untuk memasukkan data
        foreach ($employeeData as $key => $value) {
            Employee::create($value);
     }
    }
}
