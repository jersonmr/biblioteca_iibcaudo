<?php

use Illuminate\Database\Seeder;
use App\Subarea;

class SubareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subarea::create([
            'name' => 'Ciencia de los Materiales',
            'description' => 'Información relacionada con el área de Ciencia de los Materiales',
            'observations' => '',
            'area_id' => 2
        ]);
        Subarea::create([
            'name' => 'Línea de Investigación Corrosión',
            'description' => 'Información relacionada con la línea de Investigación Corrosión',
            'observations' => '',
            'area_id' => 2
        ]);
        Subarea::create([
            'name' => 'Línea de Invesigación Polímeros',
            'description' => 'Información relacionada con la línea de Investigación Polímeros',
            'observations' => '',
            'area_id' => 2
        ]);
        Subarea::create([
            'name' => 'Línea de Investigación Caracterización de Materiales',
            'description' => 'Información relacionada con la línea de Investigación Caracterización de Materiales',
            'observations' => '',
            'area_id' => 2
        ]);
        Subarea::create([
            'name' => 'Línea de Investigación Nuevos Materiales',
            'description' => 'Información relacionada con la línea de Investigación Nuevos Materiales',
            'observations' => '',
            'area_id' => 2
        ]);
        Subarea::create([
            'name' => 'Línea de Investigación Simulación',
            'description' => 'Información relacionada con la línea de Investigación Simulación',
            'observations' => '',
            'area_id' => 2
        ]);
    }
}
