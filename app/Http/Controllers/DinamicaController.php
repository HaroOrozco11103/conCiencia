<?php

namespace App\Http\Controllers;

use App\Dinamica;
use Illuminate\Http\Request;

class DinamicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dinamicas.Ahorcado.index');
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
     * @param  \App\Dinamica  $dinamica
     * @return \Illuminate\Http\Response
     */
    public function show(Dinamica $dinamica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dinamica  $dinamica
     * @return \Illuminate\Http\Response
     */
    public function edit(Dinamica $dinamica)
    {
        //
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


    public function getViewDinamica(Request $request){
        $juego = $request->id;

        $vista;

        switch($juego){
            case 1: $vista = 'Dinamicas.Trivial.index'; break;
            case 2: $vista = 'Dinamicas.Memorama.index'; break;
            case 3: $vista = 'Dinamicas.Ahorcado.index'; break;
            case 4: $vista = 'Dinamicas.Mamiferos.index';break;
        }

        return view($vista);
    }
}
