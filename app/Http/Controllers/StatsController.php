<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function selectDataToSLR($tipo)
    {
        switch($tipo)
        {
          case "profeUsuario":
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `alumno_id` = 1";
          break;

          case "profeGrupo":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` WHERE `grupo_id` = 1";
          break;

          case "profeMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `grupo_id` = 1 AND `asignatura_id` = 1";
          break;

          case "globalMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = 1";
          break;

          case "globalTipoDinamica":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id`, `dinamicas`.`nombre` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `nombre` = 'Ahorcado'";
          break;

          case "globalDinamicaEspecifica":
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `dinamica_id` = 1";
          break;
        }

        $lista = DB::select($query, [1]);
        $this->SLR($lista);
    }

    public function SLR($lista)
    {
        dd($lista);
    }
}
