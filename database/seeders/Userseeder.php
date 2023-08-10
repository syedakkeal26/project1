<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[[
            'name' => 'Saj',
            'email' => 'panda123@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'admin',
            ],
            [
            'name' => 'SyedSaj26',
            'email' => 'syedsaj26@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'admin',
            ],
            [
            'name' => 'Ju',
            'email' => 'Ju123@gmail.com',
            'password' => Hash::make('123'),
            'user_type' => 'admin'
            ]];
        User::insert($users);
        // DB::table('useradmins')->insert($users);
    }
}
