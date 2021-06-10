<?php

use Illuminate\Database\Seeder;
use App\Dinamica;

class DinamicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dinamica::create([
          'nombre' => 'Ahorcado',
          'asignatura_id' => 1,
        ]);

        Dinamica::create([
          'nombre' => 'Ahorcado',
          'asignatura_id' => 2,
        ]);

        Dinamica::create([
          'nombre' => 'Ahorcado',
          'asignatura_id' => 3,
        ]);

        Dinamica::create([
          'nombre' => 'Memorama',
          'asignatura_id' => 1,
        ]);

        Dinamica::create([
          'nombre' => 'Memorama',
          'asignatura_id' => 2,
        ]);

        Dinamica::create([
          'nombre' => 'Memorama',
          'asignatura_id' => 3,
        ]);

        Dinamica::create([
          'nombre' => 'Trivial',
          'asignatura_id' => 1,
        ]);

        Dinamica::create([
          'nombre' => 'Trivial',
          'asignatura_id' => 2,
        ]);

        Dinamica::create([
          'nombre' => 'Taxonomía',
          'asignatura_id' => 4,
        ]);

        Dinamica::create([
          'nombre' => 'Trivial',
          'asignatura_id' => 4,
        ]);
    }
}
