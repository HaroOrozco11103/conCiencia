<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Participacion;
use App\Dinamica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DinamicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dinamicas = Dinamica::groupBy('nombre', 'asignatura_id')->select('nombre', 'asignatura_id')
        ->where('nombre', 'Fisica')->get();
        return view('Dinamicas.Trivial.index')->with(compact('dinamicas'));
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
        echo 'puntaje'.$request->input('marcador');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dinamica  $dinamica
     * @return \Illuminate\Http\Response
     */
    public function show(Dinamica $dinamica)
    {

        $asignatura = $dinamica->asignatura_id;
        
        $dinamicas = Dinamica::select('dinamicas.id', 'dinamicas.nombre', 'asignaturas.nombre AS asignatura')->
        join('asignaturas', 'dinamicas.asignatura_id','=', 'asignaturas.id')
        ->where('dinamicas.nombre', $dinamica->nombre)->get();
        
        $vista = 'Dinamicas.' . $dinamica->nombre . '.index';

        //dd($dinamicas);
        return view($vista, compact('asignatura', 'dinamicas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dinamica  $dinamica
     * @return \Illuminate\Http\Response
     */
    public function edit(Dinamica $dinamica)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dinamica  $dinamica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dinamica $dinamica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dinamica  $dinamica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dinamica $dinamica)
    {
        //
    }
}
