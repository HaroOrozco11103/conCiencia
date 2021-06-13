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
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `alumno_id` = " . $request->alumno . " AND `puntaje` > -1";
          break;

          case "profeAlumnoMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `alumno_id` = " . $request->alumno . " AND `asignatura_id` = " . $request->matSelect . " AND `puntaje` > -1";
          break;

          case "profeGrupo":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` WHERE `grupo_id` = " . $request->grupo . " AND `puntaje` > -1";
          break;

          case "profeGrupoMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `grupo_id` = " . $request->grupo . " AND `asignatura_id` = " . $request->matSelect . " AND `puntaje` > -1";
          break;

          case "globalMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $request->matSelect . " AND `puntaje` > -1";
          break;

          case "globalTipoDinamica":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id`, `dinamicas`.`nombre` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `nombre` = '" . $request->tipoDinSelect . "' AND `puntaje` > -1";
          break;

          case "globalDinamicaEspecifica":
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `dinamica_id` = " . $request->dinSelect . " AND `puntaje` > -1";
          break;
        }

        $lista = DB::select($query, [1]);
        $regLin = $this->SLR($lista, $request->porcentaje);
        return view('SLResults', compact('regLin'));
    }

    public function SLR($lista, $porcentaje)
    {
        $regLin = [];  //Diccionario de valores de la regresión
        $numPart = [];  //El número de participaciones es X para la regresión
        for($i=0.05; $i<=1.01; $i+=0.05) //i es el porcentaje de participaciones, i toma 20 valores diferentes
        {
          array_push($numPart, round(count($lista)*$i, 0, PHP_ROUND_HALF_DOWN));
        }

        $promPart = [];  //El promedio de los puntajes dentro de X es Y para la regresión
        foreach($numPart as $key => $nP)
        {
          $slicedList = array_slice($lista, 0, $nP);
          $suma = 0;
          foreach ($slicedList as $key => $sL)
          {
            $suma += $sL->puntaje;
          }
          array_push($promPart, $suma/$nP);
        }

        if($porcentaje <= 1)
        {
          $slicedList = array_slice($lista, 0, round(count($lista)*$porcentaje, 0, PHP_ROUND_HALF_DOWN));
          $suma = 0;
          foreach ($slicedList as $key => $sL)
          {
            $suma += $sL->puntaje;
          }
          $historico = $suma/round(count($lista)*$porcentaje, 0, PHP_ROUND_HALF_DOWN);

          $regLin = [
            [
              "nombre" => "Promedio historico",
              "resultado" => $historico,
            ],
          ];

          return $regLin;
        }

        $sumaX = 0;
        $sumaY = 0;
        $sumaProductos = 0;
        $sumaXCuad = 0;
        $sumaYCuad = 0;
        for($i=0; $i<20; $i++)
        {
            $sumaX += $numPart[$i];
            $sumaY += $promPart[$i];
            $sumaProductos += $numPart[$i] * $promPart[$i];
            $sumaXCuad += $numPart[$i]**2;
            $sumaYCuad += $promPart[$i]**2;
        }
        $mediaX = $sumaX/20;
        $mediaY = $sumaY/20;
        $mediaProductos = $sumaProductos/20;
        $mediaXCuad = $sumaXCuad/20;
        $mediaYCuad = $sumaYCuad/20;

        $varianzaX = ($mediaXCuad - ($mediaX**2));
        $varianzaY = ($mediaYCuad - ($mediaY**2));
        $desvEstX = sqrt($varianzaX);
        $desvEstY = sqrt($varianzaY);
        $covarianza = $mediaProductos - ($mediaX * $mediaY);

        $correlacion = $covarianza / ($desvEstX * $desvEstY); // Correlacion
        $b1 = (20 * $sumaProductos - $sumaX * $sumaY)/(20 * $sumaXCuad - $sumaX * $sumaX); // Pendiente β1 = (nΣxiyi-ΣxiΣyi)/(nΣxi-ΣxiΣxi)
        $b0 = $mediaY - $b1 * $mediaX; // β0 = y¯-β1x¯
        //$b0 = ($sumaY - $b1 * $sumaX)/20; // β0 = (Σyi-β1Σxi)/n
        $valPred = round($b0 + $b1 * (count($lista) * $porcentaje)); // y^ = β0+β1Xi (Valor preddecido por la regresión)

        $regLin = [
          [
            "nombre" => "Correlación",
            "resultado" => $correlacion,
          ],
          [
            "nombre" => "β1 (Pendiente)",
            "resultado" => $b1,
          ],
          [
            "nombre" => "β0",
            "resultado" => $b0,
          ],
          [
            "nombre" => "Valor predecido",
            "resultado" => $valPred,
          ],
        ];

        return $regLin;
    }
}
