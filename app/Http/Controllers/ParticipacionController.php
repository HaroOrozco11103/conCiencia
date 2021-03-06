<?php

namespace App\Http\Controllers;

use App\Participacion;
use App\Alumno;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
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
     * @param  \App\Participacion  $participacion
     * @return \Illuminate\Http\Response
     */
    public function show(Participacion $participacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participacion  $participacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Participacion $participacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participacion  $participacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participacion $participacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participacion  $participacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participacion $participacion)
    {
        //
    }

    public function agregar(Request $request){
        
        $participacion = new Participacion();

        $puntaje = -1;
        $dinamica_id = $request->input('dinamica');
        
        if(!empty(session()->has('alumno_id'))){
            $alumno_id = session()->get('alumno_id');
            $participacion->alumno_id = $alumno_id;
        }
        $participacion->puntaje = $puntaje;
        $participacion->dinamica_id = $dinamica_id;

        $participacion->save();
        
    }

    public function cambiarPuntuacion(Request $request){

        //print_r ("puntaje:". $request->input('marcador') ." alumno_id:". session()->get('alumno_id')); exit;

        $puntaje = $request->input('marcador');
        $dinamica_id = $request->input('dinamica');
        $alumno_id = session()->get('alumno_id');
        $participacion = Participacion::where('alumno_id', $alumno_id)->latest()->first();
        
        $participacion->alumno_id = $alumno_id;
        $participacion->puntaje = $puntaje;
        $participacion->dinamica_id = $dinamica_id;

        $participacion->update();
    }
}
