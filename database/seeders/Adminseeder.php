<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
           [
            [
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'name' => 'saj',
            'email' => 'saj@gmail.com',
            'password' => '123',
            'status' => 'Active'

            ],
             [
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'name' => 'Syed',
            'email' => 'saj2@gmail.com',
            'password' => '123',
            'status' => 'Active'

            ],
            [
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'name' => 'Raj',
            'email' => 'raj18@gmail.com',
            'password' => '12345',
            'status' => 'Active'
            ],
            [
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'name' => 'Syed',
            'email' => 'guru@gmail.com',
            'password' => '786',
            'status' => 'Active'
            ]
           ]
    );
    }
}
