<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AsignaturaSeeder::class);
        $this->call(DinamicaSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(ParticipacionSeeder::class);
    }
}
