<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profesores')->insert([
            ['nombre'=> 'Jesucristo','apellido'=>'Salvador','email'=>'jesucristo.salvador@mail.com'],
            ['nombre'=> 'Dalai','apellido'=>'Lame','email'=>'dalai.lame@mail.com'],
            ['nombre'=> 'Negro','apellido'=>'Pinera','email'=>'negro.pinera@mail.com'],
            ['nombre'=> 'Paty','apellido'=>'Maldonado','email'=>'paty.maldonado@mail.com'],
            ['nombre'=> 'Michael','apellido'=>'Chill-E','email'=>'michael.chill-e@mail.com'],
            ['nombre'=> 'Lil','apellido'=>'EastCost','email'=>'lil.eastcost@mail.com'],
        ]);
    }
}
