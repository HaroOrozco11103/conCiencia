<?php

use Illuminate\Database\Seeder;
use App\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumno::create([
          'nombre' => 'Haro Orozco',
          'username' => 'HaroOrozco',
          'grupo_id' => 1,
        ]);

        Alumno::create([
          'nombre' => 'Adan Piceno',
          'username' => 'Metalgdl15',
          'grupo_id' => 2,
        ]);

        Alumno::create([
          'nombre' => 'Guadalupe Ayala',
          'username' => 'iamlupita',
          'grupo_id' => 3,
        ]);

        factory(Alumno::class, 117)->create();
    }
}
