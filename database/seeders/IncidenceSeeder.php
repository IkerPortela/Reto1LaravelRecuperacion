<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class IncidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidences')->insert([
            "title"=>"Escasez de materiales de mecanica",
            "text"=>"En el departamento de mecanica se encuentra una falta de materiales que a la larga puede ser notoria, arreglen esto cuanto antes.",
            "estimated_time"=> 120,
            "created_at"=>now(),
            "user_id"=> 4,
            "category_id"=> 2,
            "department_id"=> 3,
            "priority_id"=> 1,
            "status_id"=> 2
        ]);
        DB::table('incidences')->insert([
            "title"=>"Cables tirados por todos lados",
            "text"=>"Siempre que llego a mi turno hay cables de routers sin ordenar tirados por todo el suelo. El otro dia casi me tropiezo. No es algo que no me deje trabajar, pero se necesita una limpieza cuanto antes.",
            "estimated_time"=> 60,
            "created_at"=>now(),
            "user_id"=> 2,
            "category_id"=> 2,
            "department_id"=> 1, 
            "priority_id"=> 1,
            "status_id"=> 1
        ]);
        DB::table('incidences')->insert([
            "title"=>"Cliente que se ha ido sin pagar",
            "text"=>"El sabado vino un cliente con su coche y no pago sus averías, se le debe de denunciar inmediatamente.",
            "estimated_time"=> 140,
            "created_at"=>now(),
            "user_id"=> 3, 
            "category_id"=> 1,
            "department_id"=> 3,
            "priority_id"=> 3,
            "status_id"=> 2
        ]);
    }
}