<?php

use Illuminate\Database\Seeder;
use App\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'Polímeros',
            'description' => 'Laboratorio de Polímeros',
            'observations' => ''
        ]);
        Area::create([
            'name' => 'Ciencia de los Materiales',
            'description' => 'Información relacionada con el área de Ciencia de los Materiales',
            'observations' => ''
        ]);
        Area::create([
            'name' => 'Biomedicina',
            'description' => 'Información relacionada con el área de Biomedicina',
            'observations' => ''
        ]);
    }
}
