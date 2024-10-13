<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [   
            [
                "id"=> 1,
                "name"=>"Admin",
                "username"=>"iniadmin",
                "password"=>bcrypt('123456'),
                "photo"=>"",
                "role"=>"admin"
            ],
            [
                "id"=> 2,
                "name"=>"Farah Novia",
                "username"=>"iniowner",
                "password"=>bcrypt('123456'),
                "photo"=>"",
                "role"=>"owner"
            ]
            ];

            //untuk memasukkan data
            foreach ($userData as $key => $value) {
                User::create($value);
         }
    }
}
