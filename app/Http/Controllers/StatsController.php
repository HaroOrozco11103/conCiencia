<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Asignatura;
use App\Alumno;
use App\Grupo;
use App\Dinamica;

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
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `alumno_id` < 0";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `alumno_id` = " . $request->alumno . " AND `puntaje` = -1";
              $cat = Alumno::where('id', $request->alumno)->get()[0]->nombre . " (" .  Alumno::where('id', $request->alumno)->get()[0]->username . ")";
          break;

          case "profeAlumnoMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `alumno_id` = " . $request->alumno . " AND `asignatura_id` = " . $request->matSelect . " AND `puntaje` > -1";
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `alumno_id` < 0";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `alumno_id` = " . $request->alumno . " AND `asignatura_id` = " . $request->matSelect . " AND `puntaje` = -1";
              $cat = Alumno::where('id', $request->alumno)->get()[0]->nombre . " (" .  Alumno::where('id', $request->alumno)->get()[0]->username . ")" . " - " .  Asignatura::where('id', $request->matSelect)->get()[0]->nombre;
          break;

          case "profeGrupo":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` WHERE `grupo_id` = " . $request->grupo . " AND `puntaje` > -1";
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `alumno_id` < 0";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` WHERE `grupo_id` = " . $request->grupo . " AND `puntaje` = -1";
              $cat = Grupo::where('id', $request->grupo)->get()[0]->nombre . " (" .  Grupo::where('id', $request->grupo)->get()[0]->codigo . ")";
          break;

          case "profeGrupoMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `alumnos`.`grupo_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `grupo_id` = " . $request->grupo . " AND `asignatura_id` = " . $request->matSelect . " AND `puntaje` > -1";
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `alumno_id` < 0";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `alumnos` ON `participacions`.`alumno_id` = `alumnos`.`id` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `grupo_id` = " . $request->grupo . " AND `asignatura_id` = " . $request->matSelect . " AND `puntaje` = -1";
              $cat = Grupo::where('id', $request->grupo)->get()[0]->nombre . " (" .  Grupo::where('id', $request->grupo)->get()[0]->codigo . ")" . " - " .  Asignatura::where('id', $request->matSelect)->get()[0]->nombre;
          break;

          case "globalMateria":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $request->matSelect . " AND `puntaje` > -1";
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $request->matSelect . " AND `alumno_id` IS NULL";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $request->matSelect . " AND `puntaje` = -1";
              $cat = Asignatura::where('id', $request->matSelect)->get()[0]->nombre;
          break;

          case "globalTipoDinamica":
              $query = "SELECT `participacions`.`id`, `participacions`.`dinamica_id`, `participacions`.`puntaje`, `participacions`.`alumno_id`, `dinamicas`.`asignatura_id`, `dinamicas`.`nombre` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `nombre` = '" . $request->tipoDinSelect . "' AND `puntaje` > -1";
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `nombre` = '" . $request->tipoDinSelect . "' AND `alumno_id` IS NULL";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `nombre` = '" . $request->tipoDinSelect . "' AND `puntaje` = -1";
              $cat = $request->tipoDinSelect;
          break;

          case "globalDinamicaEspecifica":
              $query = "SELECT * FROM `conciencia`.`participacions` WHERE `dinamica_id` = " . $request->dinSelect . " AND `puntaje` > -1";
              $queryUnrgst = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `dinamica_id` = " . $request->dinSelect . " AND `alumno_id` IS NULL";
              $queryAbnd = "SELECT COUNT(`participacions`.`id`) AS 'conteo' FROM `conciencia`.`participacions` WHERE `dinamica_id` = " . $request->dinSelect . " AND `puntaje` = -1";
              $cat = Dinamica::where('id', $request->dinSelect)->get()[0]->nombre . " - " . Dinamica::where('id', $request->dinSelect)->get()[0]->asignatura->nombre;
          break;
        }

        $lista = DB::select($query, [1]);
        if($lista == [])
        {
            //mensaje
            dd("No existen datos suficientes para mostrar los resultados");
            return;
        }
        $tam = sizeof($lista);
        $unregistered = [];
        $unregistered[0] = DB::select($queryUnrgst, [1])[0]->conteo;
        $unregistered[1] = round(($unregistered[0]*100)/$tam, 1);
        $abandono = [];
        $abandono[0] = DB::select($queryAbnd, [1])[0]->conteo;
        $abandono[1] = round(($abandono[0]*100)/$tam, 1);

        $resultado =  $this->SLR($lista, $request->porcentaje);
        $regLin = $resultado[0];
        $recta = $resultado[1];
        $scatterPlot = $resultado[2];
        $puntoPred[0] = $resultado[3];

        return view('SLResults', compact('regLin', 'recta', 'scatterPlot', 'puntoPred', 'unregistered', 'abandono', 'cat'));
    }

    public function SLR($lista, $porcentaje)
    {
        $cantDatos = 0;  //Cantidad de datos a analizar
        if((round(count($lista)*$porcentaje, 0, PHP_ROUND_HALF_DOWN)) < 1)  //Si el número de participaciones para cada porcentaje es menor a uno
        {
          $cantDatos = 1.0;  //Insertar el valor 1.0 (De no hacer esto la función redondearía hacia 0 y no es posible trabajar las siguientes funciones con 0 como valor)
        }
        else {
          $cantDatos = round(count($lista)*$porcentaje, 0, PHP_ROUND_HALF_DOWN);
        }
        $regLin = [];  //Diccionario de valores de la regresión
        $numPart = [];  //El número de participaciones es X para la regresión
        for($i=0.05; $i<=1.01; $i+=0.05) //i es el porcentaje de participaciones, i toma 20 valores diferentes
        {
          if((round(count($lista)*$i, 0, PHP_ROUND_HALF_DOWN)) < 1)  //Si el número de participaciones para cada porcentaje es menor a uno
          {
            array_push($numPart, 1.0);  //Insertar el valor 1.0 (De no hacer esto la función redondearía hacia 0 y no es posible trabajar las siguientes funciones con 0 como valor)
          }
          else {
            array_push($numPart, round(count($lista)*$i, 0, PHP_ROUND_HALF_DOWN));
          }
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
        $valPred = round($b0 + $b1 * (count($lista) * $porcentaje)); // y^ = β0+β1Xi (Valor predecido por la regresión)
        if($valPred < 0) $valPred = 0;

        if($porcentaje <= 1)
        {
          $slicedList = array_slice($lista, 0, $cantDatos);
          $suma = 0;
          foreach ($slicedList as $key => $sL)
          {
            $suma += $sL->puntaje;
          }
          $historico = $suma/$cantDatos;

          $regLin = [
            [
              [
                "nombre" => "porcentaje de datos",
                "resultado" => $porcentaje*100 . "%",
              ],
              [
                "nombre" => "número de participaciones",
                "resultado" => $cantDatos,
              ],
              [
                "nombre" => "promedio de puntajes en este punto",
                "resultado" => round($historico, 2),
              ],
            ],
            [
              [0, round($b0 + $b1 * 0)],
              [count($lista), round($b0 + $b1 * (count($lista)))],
            ],
          ];
        }
        else
        {
          $regLin = [
            [
              [
              "nombre" => "porcentaje de datos",
              "resultado" => $porcentaje*100 . "%",
              ],
              [
                "nombre" => "número de participaciones",
                "resultado" => $cantDatos,
              ],
              [
                "nombre" => "precisión de la predicción",
                "resultado" => abs(round($correlacion*100)),
              ],
              [
                "nombre" => "porcentaje de progreso",
                "resultado" => round($b1*100, 2),
              ],
              [
                "nombre" => "promedio de puntajes predecido",
                "resultado" => $valPred,
              ],
            ],
            [
              [0, round($b0 + $b1 * 0)],
              [count($lista) * $porcentaje, round($b0 + $b1 * (count($lista) * $porcentaje))],
            ],
          ];
        }

        //Puntos del ScatterPlot en [2]
        for($i=0; $i<20; $i++)
        {
          $regLin[2][$i] = [$numPart[$i], $promPart[$i]];
        }
        array_push($regLin, [$cantDatos, $valPred]);  //Punto predecido en [3]

        return $regLin;
    }

    public function selectDataToKNNc(Request $request)
    {
        //$this->massiveClasif(); exit; //CLASIFICACIÓN MASIVA DE LA MAYORÍA DE ALUMNOS
        
        $asignaturas = Asignatura::all();
        $alumnos = Alumno::all();
        $listaPre = [];  //Lista preeliminar de la cuál se sacará la lista definitiva
        $lista = [];
        foreach ($alumnos as $key => $alu)
        {
          foreach ($asignaturas as $key => $asi)
          {
            $query = "SELECT COUNT(`participacions`.`puntaje`) AS `numPart`, SUM(`participacions`.`puntaje`) AS `sumPunt`, `dinamicas`.`asignatura_id`, `participacions`.`alumno_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $asi->id . " AND `alumno_id` = " . $alu->id . " AND `puntaje` > -1 GROUP BY `alumno_id`, `asignatura_id`";
            $data = DB::select($query, [1]);
            if(empty($data))
            {
              $query = "SELECT `participacions`.`puntaje` AS `numPart`, `participacions`.`puntaje` AS `sumPunt`, `dinamicas`.`asignatura_id`, `participacions`.`alumno_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `participacions`.`id` = 1";
              $data = DB::select($query, [1]);
              $data[0]->numPart = 0;
              $data[0]->sumPunt = "0";
              $data[0]->asignatura_id = $asi->id;
              $data[0]->alumno_id = $alu->id;
            }
            array_push($listaPre, $data[0]);
          }
        }
        foreach ($alumnos as $key => $alu)  //Crear la lista de alumnos clasificados
        {
          if($alu->id == $request->alumno || $alu->asigClas == null) continue;
          $userKNN = [];
          $userKNN[0] = $alu->asigClas;
          foreach ($listaPre as $key => $lP)
          {
            if($alu->id == $lP->alumno_id)
            {
              if($lP->numPart > 0) $ratio = $lP->sumPunt/$lP->numPart;  //Proporción de puntaje jugadas sobre veces jugadas
              else $ratio = 0;
              array_push($userKNN, $ratio);
            }
          }
          array_push($lista, $userKNN);  //Ejemplo de como quedaría el arreglo userKNN -> {materia, ratio, ratio, ratio, ratio, 0.0}
        }

        $alumnoData = [];
        $alumnoData[0] = 0;
        foreach ($listaPre as $key => $lP)
        {
          if($lP->alumno_id == $request->alumno)
          {
            if($lP->numPart > 0) $ratio = $lP->sumPunt/$lP->numPart;
            else $ratio = 0;
            array_push($alumnoData, $ratio);
          }
        }
        if($lista == [])
        {
            //mensaje
            print_r("No existen datos suficientes para mostrar los resultados");
            exit;
        }

        $cKNN = $this->cKNN($lista, $alumnoData);
        $matClas = "";
        foreach ($asignaturas as $key => $asi)
        {
          if($asi->id == $cKNN)
          {
            $matClas = $asi->nombre;  //El nombre de la materia clasificada
          }
        }
        $data = ['asigClas' => $cKNN];
        DB::table('alumnos')->where('id', $request->alumno)->update($data);
        echo $matClas;
        //return view('xxx', compact('matClas'));  //Vista o pop que va amostrar la asginatura en la que se clasificó al alumno
    }

    public function cKNN($lista, $alumnoData)  //KNN designado a la clasificación de un usuario sobre una asignatura
    {
        //Preparación de datos necesarios para el KNN
        $k = round(sizeof($lista)*0.25);  //Número de elementos a tomar en cuenta para medir sus distancias (25%)
        $cKNN = [];  //Lista con las distancias añadidas y ordenadas
        $clasMatCount = [];  //Clasificador del alumno en materia por su contador. (Cada materia y su contador de coincidencias con el KNN)
        $asignaturas = Asignatura::all();
        foreach ($asignaturas as $key => $asi)
        {
          array_push($clasMatCount, [$asi->id, 0]);
        }
        
        //Subfuncion de insertar las distancias ordenadas
        foreach ($lista as $key => $ls)
        {
          $sumDist = 0;
          for($i=1; $i<sizeof($ls); $i++)
          {
            $cuadResRat = ($ls[$i] - $alumnoData[$i])**2;  //Caudrados de la resta de los ratios
            $sumDist += $cuadResRat;  //Suma de los caudrados de la resta de los ratios
          }
          $distancia = sqrt($sumDist);  //Distancia Euclidiana
          array_push($ls, $distancia);  //Inserta la distancia para el KNN
          array_push($cKNN, $ls);
        }
        usort($cKNN, $this->array_sorter(sizeof($alumnoData)));  //Ordenar arreglo por sus distancias

        //Subfuncion de clasificar
        for($i=0; $i<$k; $i++)
        {
          for($j=0; $j<sizeof($clasMatCount); $j++)
          {
            if($cKNN[$i][0] == $clasMatCount[$j][0])
            {
              $clasMatCount[$j][1]++;
            }
          }
        }
        usort($clasMatCount, $this->array_sorter(1, "DESC"));  //Ordenar arreglo por su contador
        $alumnoData[0] = array_shift($clasMatCount)[0];  //Clasificar al alumno en la materia cuyo contador resultó mayor

        return $alumnoData[0];  //En la posición 0 del arreglo está el id de la materia
    }

    public function selectDataToKNNr($dinamica)
    {
        $alumnos = Alumno::all();
        $dinamicas = Dinamica::all();
        $asignaturas = Asignatura::all();
        $lista = [];  //Matriz de dinamica completa sin tomar en cuenta la dinamica pasada por parametro
        $dinamicaData = [];  //Vector de dinamica solo para la dinamica pasada por paratro

        foreach ($dinamicas as $key => $din)
        {
          $query = "SELECT COUNT(`participacions`.`id`) AS `numPart`, `participacions`.`dinamica_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `dinamicas`.`id` = " . $din->id . " AND `alumno_id` > 0 AND `puntaje` > -1 GROUP BY `alumno_id`, `dinamica_id`";
          $data = DB::select($query, [1]);
          if($din->id == $dinamica) $dinamicaData = $data;
          else array_push($lista, $data);
        }

        if($lista == [])
        {
            //mensaje
            dd("No existen datos suficientes para mostrar los resultados");
            return;
        }

        $rKNN = $this->rKNN($lista, $dinamicaData);  //El id de los tres valores recomendados
        $dinRec = [];  //El nombre de los tres valores recomendados
        foreach ($rKNN as $key => $KNN)  //Sacar el nombre de los valores recomendados
        {
          foreach ($dinamicas as $key => $din)
          {
            if($din->id == $KNN[0])
            {
              $KNN[1] = $din->nombre . " - " . $din->asignatura->nombre;  //El nombre de la dinamica recomendada y la asginatura a la que pertenece
              array_push($dinRec, $KNN);
            }
          }
        }

        return $dinRec;
    }

    public function rKNN($lista, $dinamicaData)  //KNN designado a la recomendación de dinamicas en una participación
    {
        //Comparación de similitud de coseno
        $rKNN = [];  //Lista con las distancias añadidas y ordenadas
        foreach ($lista as $key => $ls)
        {
          $aux = [];
          $aux[0] = $ls[0]->dinamica_id;  //Inserta al arreglo auxiliar el id de la dinamica
          $sumProd = 0;  //Sumatoria de productos (Divisor)
          $sumACuad = 0;  //Sumatoria de cuadrados de A
          $sumBCuad = 0;  //Sumatoria de cuadrados de B
          for($i=0; $i<sizeof($dinamicaData); $i++)
          {
            $sumProd += ($dinamicaData[$i]->numPart * $ls[$i]->numPart);
            $sumACuad += $dinamicaData[$i]->numPart**2;
            $sumBCuad += $ls[$i]->numPart**2;
          }
          $dividendo = sqrt($sumACuad) * sqrt($sumBCuad);
          $simCos = $sumProd/$dividendo;  //Similitud de coseno
          array_push($aux, 1-$simCos);  //Inserta al arreglo auxiliar la distancia de coseno
          array_push($rKNN, $aux);
        }
        usort($rKNN, $this->array_sorter(1));  //Ordena el arreglo por la clave 1 la cual es la posición donde se encuentran la distancias

        return array_slice($rKNN, 0, 3);  //En la posición 0 del arreglo está el id de la materia
    }

    public function array_sorter($clave,$orden=null)  //Función para ordenar los arreglos de arreglos por un indice numérico el cuál sera la clave
    {
        return function ($a, $b) use ($clave,$orden)
        {
            $result=  ($orden=="DESC") ? strnatcmp($b[$clave], $a[$clave]) :  strnatcmp($a[$clave], $b[$clave]);
            return $result;
        };
    }

    public function massiveClasif() //Clasificación masiva de la mayoría de datos
    {
        $asignaturas = Asignatura::all();
        $alumnos = Alumno::all();
        $listaPre = [];  //Lista preeliminar de la cuál se sacará la lista definitiva

        foreach ($alumnos as $key => $alu)
        {
          if($alu->id <= 20) continue;
          foreach ($asignaturas as $key => $asi)
          {
            $query = "SELECT COUNT(`participacions`.`puntaje`) AS `numPart`, SUM(`participacions`.`puntaje`) AS `sumPunt`, `dinamicas`.`asignatura_id`, `participacions`.`alumno_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `asignatura_id` = " . $asi->id . " AND `alumno_id` = " . $alu->id . " AND `puntaje` > -1 GROUP BY `alumno_id`, `asignatura_id`";
            $data = DB::select($query, [1]);
            if(empty($data))
            {
              $query = "SELECT `participacions`.`puntaje` AS `numPart`, `participacions`.`puntaje` AS `sumPunt`, `dinamicas`.`asignatura_id`, `participacions`.`alumno_id` FROM `conciencia`.`participacions` LEFT JOIN `dinamicas` ON `participacions`.`dinamica_id` = `dinamicas`.`id` WHERE `participacions`.`id` = 1";
              $data = DB::select($query, [1]);
              $data[0]->numPart = 0;
              $data[0]->sumPunt = "0";
              $data[0]->asignatura_id = $asi->id;
              $data[0]->alumno_id = $alu->id;
            }
            array_push($listaPre, $data[0]);
          }
        }

        foreach ($alumnos as $key => $alu)  //Crear la lista de alumnos clasificados
        {
          if($alu->id <= 20) continue;
          $aux = 0;  //Ratio en el que se insertó la materia
          $userKNN = [];
          foreach ($listaPre as $key => $lP)
          {
            if($alu->id == $lP->alumno_id)
            {
              if($lP->numPart > 0) $ratio = $lP->sumPunt/$lP->numPart;  //Proporción de puntaje jugadas sobre veces jugadas
              else $ratio = 0;

              if($ratio >= $aux)
              {
                $aux = $ratio;
                $userKNN[0] = $lP->asignatura_id;
              }
            }
          }
          $data = ['asigClas' => $userKNN[0]];
          DB::table('alumnos')->where('id', $alu->id)->update($data);
        }
        print_r("listo :)");
    }
}
