<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('useradmins')->insert(
            [
             [
             'name' => 'saj',
             'email' => 'saj@gmail.com',
             'password' => '123',
             'user_type' => 'admin',
             'created_at'=>Carbon::now(),
             'updated_at'=>Carbon::now()
             ],
             [
                'name' => 'Syed',
                'email' => 'saj264@gmail.com',
                'password' => '1234',
                'user_type' => 'user',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
             ],
             [
                'name' => 'Ju',
                'email' => 'saj26@gmail.com',
                'password' => '786',
                'user_type' => 'user',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]
            ]
             );
    }
}
