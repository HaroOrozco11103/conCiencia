<?php

use Illuminate\Database\Seeder;
use App\Participacion;

class ParticipacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Participacion::class, 300)->create();
    }
}
