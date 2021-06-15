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
        $multiplicador = 10;

        //Crear 300 participaciones con puntaje -1
        factory(Participacion::class, 3*$multiplicador)->states('pp-1')->create();

        //Crear 300 participaciones con puntaje 0
        factory(Participacion::class, 3*$multiplicador)->states('pp0')->create();


        //Crear 1000 participaciones con puntaje del 1 al 30
        factory(Participacion::class, 10*$multiplicador)->states('pp1-30')->create();

        //Crear 1000 participaciones con puntaje del 15 al 50
        factory(Participacion::class, 10*$multiplicador)->states('pp15-50')->create();

        //Crear 1000 participaciones con puntaje del 25 al 100
        factory(Participacion::class, 10*$multiplicador)->states('pp25-100')->create();

        //Crear 1000 participaciones con puntaje del 50 al 150
        factory(Participacion::class, 10*$multiplicador)->states('pp50-150')->create();


        //Crear 4000 participaciones con puntaje del 30 al 175
        factory(Participacion::class, 40*$multiplicador)->states('pp30-175')->create();


        //Crear 200 participaciones con alumno_id null con puntaje -1
        factory(Participacion::class, 2*$multiplicador)->states('pp-1sa')->create();

        //Crear 200 participaciones con alumno_id null con puntaje 0
        factory(Participacion::class, 2*$multiplicador)->states('pp0sa')->create();

        //Crear 1000 participaciones con alumno_id null con puntaje del 1 al 175
        factory(Participacion::class, 10*$multiplicador)->states('pp1-175sa')->create();
    }
}
