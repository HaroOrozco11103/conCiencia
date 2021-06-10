<?php

use Illuminate\Database\Seeder;
use App\Asignatura;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignatura::create([
          'nombre' => 'Física',
        ]);

        Asignatura::create([
          'nombre' => 'Artes',
        ]);

        Asignatura::create([
          'nombre' => 'Geografía',
        ]);

        Asignatura::create([
          'nombre' => 'Biología',
        ]);
    }
}
