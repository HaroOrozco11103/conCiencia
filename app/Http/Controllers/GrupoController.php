<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Alumno;
use App\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function __construct()
    {
      $this->middleware('profe')->only('entrar', 'autenticar'); //Si hay un profesor loggeado denegar acceso y redirigir
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Provee de formulario para autenticar al usuario y grupo.
     *
     * @return \Illuminate\Http\Response
     */
    public function entrar()
    {
      return view('alumnos.entrarGrupoForm'); //Ingresar a grupo como alumno o profesor
    }

    /**
     * Verifica y autentica los valores que recibe para ingresar a un grupo
     *
     * @return \Illuminate\Http\Response
     */
    public function autenticar(Request $request)
    {
        try {
            $grupo = Grupo::join('alumnos', 'grupos.id','=','alumnos.grupo_id')
            ->where('grupos.codigo', $request->codigo)->where('alumnos.username', $request->nombre)->get();

            if(sizeof($grupo) > 0){
              //enviar a la ruta el grupo y el usuario para motivos de almacenamiento de datos
              session(['alumno_id' => $grupo[0]->id]);
                return redirect()->route('asignaturas.index');
            }else{
                return redirect()->route('grupos.entrar')
                ->with([
                    'mensaje' => 'El código del grupo o el nombre del alumno no se han ingresado correctamente',
                    'alert-class' => 'alert-warning'
                ]);
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('profesores.grupoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'nombre' => 'required|string|min:5|max:50',
          'codigo' => 'required|string|min:5|max:10|unique:grupos,codigo',
          'user_id' => 'integer',
        ]);

        $gru = new Grupo();
        $gru->nombre = $request->input('nombre');
        $gru->codigo = $request->input('codigo');
        $gru->user_id = \Auth::user()->id;

        $gru->save();
        $grupo = Grupo::where('user_id',\Auth::user()->id)->get();
        return redirect()->route('grupos.show', $grupo[0]->id)
          ->with([
              'mensaje' => 'El grupo ha sido creado exitosamente',
              'alert-class' => 'alert-warning'
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        $profeId = \Auth::user()->id;
        $grupos = DB::table('grupos')->where('user_id', $profeId)->get();
        $alumnos = DB::table('alumnos')->where('grupo_id', $grupo->id)->get();
        $materias = DB::select('SELECT `id`, `nombre` FROM `conciencia`.`asignaturas`', [1]);
        return view('profesores.grupoShow', compact('grupos', 'profeId','grupo', 'alumnos', 'materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
      //
    }

    public function updateNombre(Request $request)
    {
        $request->validate([
          'nombreGrupo' => 'required|string|min:5|max:50',
        ]);
        $data = ['nombre' => $request->nombreGrupo];
        $grupo = DB::table('grupos')->where('id', $request->idGrupo)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
