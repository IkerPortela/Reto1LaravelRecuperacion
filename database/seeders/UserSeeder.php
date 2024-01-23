<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([     
            "name"=>"Usuario1",
            "email"=>"iker.portelapl@elorrieta-errekamari.com",
            "password"=>Hash::make('12121212'),
            "department_id"=>"1"
        ]);

        DB::table('users')->insert([     
            "name"=>"Usuario2", 
            "email"=>"iker.portelapl@gmail.com",
            "password"=>Hash::make('12121212'),
            "department_id"=>"1"
        ]);

        DB::table('users')->insert([     
            "name"=>"Usuario3", 
            "email"=>"ikerportela@gmail.com",
            "password"=>Hash::make('12121212'),
            "department_id"=>"3"
        ]);

        DB::table('users')->insert([     
            "name"=>"Usuario4", 
            "email"=>"iker.ortelapl@elorrieta-errekamari.com",
            "password"=>Hash::make('12121212'),
            "department_id"=>"3"
        ]);

        DB::table('users')->insert([     
            "name"=>"Usuario5", 
            "email"=>"ikerprtela@gmail.com",
            "password"=>Hash::make('12121212'),
            "department_id"=>"2"
        ]);

        DB::table('users')->insert([     
            "name"=>"Usuario6", 
            "email"=>"ikerptela@gmail.com",
            "password"=>Hash::make('12121212'),
            "department_id"=>"1"
        ]);
    }
}