<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Asignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Provee de formulario para autenticar al usuario y grupo.
     *
     * @return \Illuminate\Http\Response
     */
    public function entrar()
    {
      return view('entrarGrupoForm'); //Ingresar a grupo como alumno o profesor
    }

    /**
     * Verifica y autentica los valores que recibe para ingresar a un grupo
     *
     * @return \Illuminate\Http\Response
     */
    public function autenticar(Request $request)
    {
        try {

            $grupo = DB::table('grupos')->join('alumnos', 'grupos.id','=','alumnos.grupo_id')
            ->where('grupos.codigo', $request->codigo)->where('alumnos.username', $request->nombre)->get();

            if(sizeof($grupo) > 0){
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
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
