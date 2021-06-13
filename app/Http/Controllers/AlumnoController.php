<?php

namespace App\Http\Controllers;

use App\Grupo;
use App\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Grupo $grupo)
    {
        $profeId = \Auth::user()->id;
        $grupos = DB::table('grupos')->where('user_id', $profeId)->get();
        return view('profesores.alumnoForm', compact('grupo', 'grupos'));
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
          'username' => 'required|string|min:5|max:25|unique:alumnos,username',
          'grupo_id' => 'integer',
        ]);

        $alu = new Alumno();
        $alu->nombre = $request->nombre;
        $alu->username = $request->username;
        $alu->grupo_id = $request->grupo_id;

        $alu->save();

        return redirect()->route('grupos.show', $request->grupo_id)
          ->with([
              'mensaje' => 'El alumno ha sido inscrito exitosamente',
              'alert-class' => 'alert-warning'
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $profeId = \Auth::user()->id;
        $grupos = DB::table('grupos')->where('user_id', $profeId)->get();
        $materias = DB::select('SELECT `id`, `nombre` FROM `conciencia`.`asignaturas`', [1]);
        return view('profesores.alumnoStats', compact('alumno', 'grupos', 'materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
          'nombre' => 'required|string|min:5|max:50',
          'username' => 'required|string|min:5|max:25|unique:alumnos,username,'.$alumno->id,
          'grupo_id' => 'integer',
        ]);

        $alumno->nombre = $request->nombre;
        $alumno->username = $request->username;
        $alumno->grupo_id = $request->grupo_id;
        $alumno->save();

        return redirect()->route('grupos.show', $request->grupo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
