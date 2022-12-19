<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make("password");
        //
        $data = [
            [
                'name'=> 'Administrator', 
                'email'=> 'admin@mail.com', 
                'password'=> $password,
                'role'=> "admin",
            ]
        ];

        
        foreach ($data as $key => $value) {
            User::create($value);
        }
    }
}
