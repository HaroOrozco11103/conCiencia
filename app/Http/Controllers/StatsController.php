<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index()
    {
        $dinQuery = "SELECT `dinamicas`.`id`, `dinamicas`.`nombre`, `asignaturas`.`nombre` AS 'aNombre'  FROM `conciencia`.`dinamicas` LEFT JOIN `asignaturas` ON `dinamicas`.`asignatura_id` = `asignaturas`.`id`";
        $materias = DB::select('SELECT `id`, `nombre` FROM `conciencia`.`asignaturas`', [1]);
        $dinamicas = DB::select($dinQuery, [1]);
        $tipoDinamicas = DB::select('SELECT `nombre` FROM `conciencia`.`dinamicas` GROUP BY `nombre`', [1]);
        return view('stats', compact('materias', 'dinamicas', 'tipoDinamicas'));
    }

    public function selectDataToSLR(Request $request, $tipo)
    {
        switch($tipo)
        {
          case "profeAlumno":
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `alumno_id` = " . $tipo;
          break;

          case "profeGrupo":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` WHERE `grupo_id` = " . $tipo;
          break;

          case "profeMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `grupo_id` = " . $tipo . "AND `asignatura_id` = " . $tipo;
          break;

          case "globalMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $request->matSelect;
          break;

          case "globalTipoDinamica":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id`, `dinamicas`.`nombre` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `nombre` = " . "'" . $request->tipoDinSelect . "'";
          break;

          case "globalDinamicaEspecifica":
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `dinamica_id` = " . $request->dinSelect;
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
