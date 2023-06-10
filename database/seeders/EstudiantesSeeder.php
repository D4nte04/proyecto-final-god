<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estudiantes')->insert([
            ['rut'=> '20735268-3', 'nombre'=> 'Belial','apellido'=>'Jordan23','email'=>'estudiante1@mail.com'],
            ['rut'=> '20239167-2', 'nombre'=> 'Behemoth','apellido'=>'El Chamako','email'=>'estudiante2@mail.com'],
            ['rut'=> '21502551-9', 'nombre'=> 'Beelzebub','apellido'=>'Nach','email'=>'estudiante3@mail.com'],
            ['rut'=> '21936590-k', 'nombre'=> 'Asmodeus','apellido'=>'Cister','email'=>'estudiante4@mail.com'],
            ['rut'=> '18479574-4', 'nombre'=> 'Satanás','apellido'=>'Chill-E','email'=>'estudiante5@mail.com'],
            ['rut'=> '17437166-0', 'nombre'=> 'Lucifer','apellido'=>'Westcoast','email'=>'estudiante6@mail.com'],
        ]);
    }
}
