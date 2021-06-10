<?php

use Illuminate\Database\Seeder;
use App\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create([
          'nombre' => 'Francisco Villa 3C',
          'codigo' => 'FV3C',
          'user_id' => 2,
        ]);

        Grupo::create([
          'nombre' => 'Maria Teresa Campirano 6A',
          'codigo' => 'MTC6A',
          'user_id' => 3,
        ]);

        Grupo::create([
          'nombre' => 'David Alfaro Siqueiros 4B',
          'codigo' => 'DAS4B',
          'user_id' => 4,
        ]);
    }
}
