<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name'      =>  'admin',
                'email'     =>  'admin@admin',
                'password'  =>  bcrypt('password'),
                'role'      =>  'admin',
            ],
            [
                'name'          =>  'user',
                'email'         =>  'user@user',
                'password'      =>  bcrypt('password'),
                'role'          =>  'user',
                'village_id'    =>  1
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
