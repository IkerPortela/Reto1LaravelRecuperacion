<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([     
            "name"=>"Muy Alta"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Alta"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Medio"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Baja"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Muy Baja"
        ]);
    }
}
