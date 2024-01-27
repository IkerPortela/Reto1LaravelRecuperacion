<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DepartmentSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(IncidenceSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
