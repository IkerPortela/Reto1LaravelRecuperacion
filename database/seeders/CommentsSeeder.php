<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            "text"=>"Espero que lo arreglen pronto, no me gusta mucho la idea de traer los materiales de mi casa",
            "usedTime"=>true,
            "incidence_id"=> 1,
            "user_id"=> 3
        ]);
        DB::table('comments')->insert([
            "text"=>"Muy buenas, paso algo parecido en mi departamento, tengo entendido que lo estan investigando, ¡Un saludo!",
            "usedTime"=>true,
            "incidence_id"=> 3,
            "user_id"=> 4
        ]);
        DB::table('comments')->insert([
            "text"=>"El otro dia me tropece por esa razon, apoyo esta incidencia",
            "usedTime"=>true,
            "incidence_id"=> 2,
            "user_id"=> 6
        ]);
    }
}