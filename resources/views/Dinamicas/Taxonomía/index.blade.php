@extends('layouts.index')

@section('content')

@include("layouts.popup")
    <div class="contenido">
        <h1 class="text-center"> ORDENES DE MAMIFEROS</h1>
        <br> <br>


        <!-- PRIMERA FILA DE DATOS-->
        <div class="row">

            <!--Nacimiento-->
            <div class="col-md-2 " id="Nacimiento">
                <h3>Nacimiento</h3>

                <div class="options">
                    <input class="box" type="checkbox" name="theria" value="theria" id="theria"> <label for="theria"> Theria (viviparo) </label>
                    <input class="box" type="checkbox" name="prototheria" value="prototheria" id="prototheria"> <label for="prototheria"> Protheria (Ovíparo) </label>
                </div>
            </div>

            <!--Desarrollo-->
            <div class="col-md-2 " id="Desarrollo">
                <h3>Desarrollo</h3>

                <div class="options">
                    <input class="box" type="checkbox" name="eutheria" value="eutheria" id="eutheria"> <label for="eutheria"> Eutheria (placnetario) </label>
                    <input class="box" type="checkbox" name="metatheria" value="metatheria" id="metatheria"> <label for="metatheria"> Metatheria (Marsupial) </label>
                </div>
            </div>

            <!--Locacion-->
            <div class="col-md-2 " id="Locacion">
                <h3>Locación</h3>

                <div class="options">
                    <input class="box" type="checkbox" name="endemico_africa" value="endemico_africa" id="endemico_africa"> <label for="endemico_africa"> Africa </label>
                    <input class="box" type="checkbox" name="endemico_australia" value="endemico_australia" id="endemico_australia"> <label for="endemico_australia"> Australia </label>
                    <input class="box" type="checkbox" name="endemico_america" value="endemico_america" id="endemico_america"> <label for="endemico_america"> América </label>
                    <input class="box" type="checkbox" name="endemico_asia" value="endemico_asia" id="endemico_asia"> <label for="endemico_asia"> Asia </label>
                </div>
            </div>

            <!--Alimentacion-->
            <div class="col-md-2 " id="Alimentacion">
                <h3>Alimentación</h3>

                <div class="options">
                    <input class="box" type="checkbox" name="omnivoro" value="omnivoro" id="omnivoro" > <label for="omnivoro"> Omnívoro </label>
                    <input class="box" type="checkbox" name="carnivoro" value="carnivoro" id="carnivoro"> <label for="carnivoro"> Carnívoro </label>
                    <input class="box" type="checkbox" name="herbivoro" value="herbivoro" id="herbivoro"> <label for="herbivoro"> Hervívoro </label>
                    <input class="box" type="checkbox" name="insectivoro" value="insectivoro" id="insectivoro"> <label for="insectivoro"> Insectívoro </label>
                    <input class="box" type="checkbox" name="frugivoro" value="frugivoro" id="frugivoro"> <label for="frugivoro"> Frugívoro </label>
                    <input class="box" type="checkbox" name="hematofago" value="hematofago" id="hematofago"> <label for="hematofago"> Hematófago </label>
                </div>
            </div>

            <!--Tamaño-->
            <div class="col-md-2 " id="Tamaño">
                <h3>Tamaño</h3>

                <div class="options">
                    <input class="box" type="checkbox" name="pequeno" value="pequeno" id="pequeno"> <label for="pequeno"> Pequeño </label>
                    <input class="box" type="checkbox" name="mediano" value="mediano" id="mediano"> <label for="mediano"> Mediano </label>
                    <input class="box" type="checkbox" name="grande" value="grande" id="grande"> <label for="grande"> Grande </label>
                    <input class="box" type="checkbox" name="muy_grande" value="muy_grande" id="muy_grande"> <label for="muy_grande"> Muy grande </label>
                </div>
            </div>

            <!--Transporte-->
            <div class="col-md-2 " id="Transporte">
                <h3>Transoporte</h3>

                <div class="options">
                    <input class="box" type="checkbox" name="terrestre" value="terrestre" id="terrestre"> <label for="terrestre"> Terrestre </label>
                    <input class="box" type="checkbox" name="acuatico" value="acuatico" id="acuatico"> <label for="acuatico"> Acuático </label>
                    <input class="box" type="checkbox" name="semiacuatico" value="semiacuatico" id="semiacuatico"> <label for="semiacuatico"> Semiacuático </label>
                    <input class="box" type="checkbox" name="aereo" value="aereo" id="aereo"> <label for="aereo"> Aereo </label>
                    <input class="box" type="checkbox" name="arboricola" value="arboricola" id="arboricola"> <label for="arboricola"> Arborícola </label>
                </div>
            </div>
        </div> <!--Fin de la primera fila de datos-->

        <!--Division entre datos y respuestas-->
        <div class="row">
            <div class="col-md-8">

                <!--Segunda fila de datos-->
                <div class="row">
                    <!--Cabeza-->
                    <div class="col-md-3 grupo" id="Cabeza">
                        <h3>Cabeza</h3>

                        <div class="options">
                            <input class="box" type="checkbox" name="hocico_alargado" value="hocico_alargado" id="hocico_alargado"> <label for="hocico_alargado"> Hocico alargado </label>
                            <input class="box" type="checkbox" name="hocico_proboscide" value="hocico_proboscide" id="hocico_proboscide"> <label for="hocico_proboscide"> Hocico proboscide </label>
                            <input class="box" type="checkbox" name="labio_leporino" value="labio_leporino" id="labio_leporino"> <label for="labio_leporino"> Labio leporino </label>
                            <input class="box" type="checkbox" name="orejas_largas" value="orejas_largas" id="orejas_largas"> <label for="orejas_largas"> Orejas largas </label>
                            <input class="box" type="checkbox" name="pico" value="pico" id="pico"> <label for="pico"> Pico </label>
                            <input class="box" type="checkbox" name="ojos_diminutos" value="ojos_diminutos" id="ojos_diminutos"> <label for="ojos_diminutos"> Ojos diminutos </label>
                            <input class="box" type="checkbox" name="ojos_vestigiales" value="ojos_vestigiales" id="ojos_vestigiales"> <label for="ojos_vestigiales"> Ojos vestigiales (Ceguera) </label>
                            <input class="box" type="checkbox" name="vision_desarrollado" value="vision_desarrollado" id="vision_desarrollado"> <label for="vision_desarrollado"> Visión desarrollada </label>
                            <input class="box" type="checkbox" name="lengua_protactil" value="lengua_protactil" id="lengua_protactil"> <label for="lengua_protactil"> Lengua protáctil </label>
                        </div>
                    </div>

                    <!--Morfologia-->
                    <div class="col-md-4 " id="Morfologia">
                        <h3 style="margin-left: 20%;">Morfología</h3>

                        <div class="options">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="box" type="checkbox" name="garras" value="garras" id="garras"> <label for="garras"> Garras </label>
                                    <input class="box" type="checkbox" name="patagio" value="patagio" id="patagio"> <label for="patagio"> Patagio </label>
                                    <input class="box" type="checkbox" name="escamas" value="escamas" id="escamas"> <label for="escamas"> Escamas </label>
                                    <input class="box" type="checkbox" name="aletas" value="aletas" id="aletas"> <label for="aletas"> Aletas </label>
                                    <input class="box" type="checkbox" name="placa_osea" value="placa_osea" id="placa_osea"> <label for="placa_osea"> Placa ósea </label>
                                    <input class="box" type="checkbox" name="pezunas" value="pezunas" id="pezunas"> <label for="pezunas"> Pezuñas </label>
                                    <input class="box" type="checkbox" name="pelaje" value="pelaje" id="pelaje"> <label for="pelaje"> Pelaje </label>
                                    <input class="box" type="checkbox" name="puas_o_espinas" value="puas_o_espinas" id="puas_o_espinas"> <label for="puas_o_espinas"> Púas o espinas </label>
                                    <input class="box" type="checkbox" name="escroto" value="escroto" id="escroto"> <label for="escroto"> Escroto </label>
                                </div>

                                <div class="col-md-6">
                                    <input class="box" type="checkbox" name="espiraculo" value="espiraculo" id="espiraculo"> <label for="espiraculo"> Espiraculo </label>
                                    <input class="box" type="checkbox" name="unas_planas" value="unas_planas" id="unas_planas"> <label for="unas_planas"> Uñas planas </label>
                                    <input class="box" type="checkbox" name="articulaciones_xenartrales" value="articulaciones_xenartrales" id="articulaciones_xenartrales"> <label for="articulaciones_xenartrales"> Articulaciones xenartrales </label>
                                    <input class="box" type="checkbox" name="cola_prensil" value="cola_prensil" id="cola_prensil"> <label for="cola_prensil"> Cola prensil </label>
                                    <input class="box" type="checkbox" name="cola_larga" value="cola_larga" id="cola_larga"> <label for="cola_larga"> Cola larga </label>
                                    <input class="box" type="checkbox" name="huellas_digitales" value="huellas_digitales" id="huellas_digitales"> <label for="huellas_digitales"> Huellas digitales </label>
                                    <input class="box" type="checkbox" name="sin_marsupio" value="sin_marsupio" id="sin_marsupio"> <label for="sin_marsupio"> Sin marsupio </label>
                                    <input class="box" type="checkbox" name="robusto" value="robusto" id="robusto"> <label for="robusto"> Robusto </label>
                                    <input class="box" type="checkbox" name="piel_gruesa" value="piel_gruesa" id="piel_gruesa"> <label for="piel_gruesa"> Piel gruesa </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Dientes-->
                    <div class="col-md-4 " id="Dientes">
                        <h3 style="margin-left: 30%;">Dientes</h3>

                        <div class="options">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="box" type="checkbox" name="caninos_desarrollados" value="caninos_desarrollados" id="caninos_desarrollados"> <label for="caninos_desarrollados"> Caninos desarrollados </label>
                                    <input class="box" type="checkbox" name="sin_caninos" value="sin_caninos" id="sin_caninos"> <label for="sin_caninos"> Sin caninos </label>
                                    <input class="box" type="checkbox" name="carniceras_desarrollados" value="carniceras_desarrollados" id="carniceras_desarrollados"> <label for="carniceras_desarrollados"> Carniceras desarrolladas </label>
                                    <input class="box" type="checkbox" name="diastema_marcado" value="diastema_marcado" id="diastema_marcado"> <label for="diastema_marcado"> Diastema marcado </label>
                                    <input class="box" type="checkbox" name="sin_diastema" value="sin_diastema" id="sin_diastema"> <label for="sin_diastema"> Sin diastema </label>
                                    <input class="box" type="checkbox" name="sin_incisivos" value="sin_incisivos" id="sin_incisivos"> <label for="sin_incisivos"> Sin incisivos </label>
                                    <input class="box" type="checkbox" name="incisivos_desarrollados" value="incisivos_desarrollados" id="incisivos_desarrollados"> <label for="incisivos_desarrollados"> Incisivos desarrollados </label>
                                    <input class="box" type="checkbox" name="incisivos_no_desarrollados" value="incisivos_no_desarrollados" id="incisivos_no_desarrollados"> <label for="incisivos_no_desarrollados"> Incisivos no desarrollados </label>
                                    <input class="box" type="checkbox" name="incisivos_hipertrofiados" value="incisivos_hipertrofiados" id="incisivos_hipertrofiados"> <label for="incisivos_hipertrofiados"> inicisivos hipertrofiados </label>
                                </div>

                                <div class="col-md-6">
                                    <input class="box" type="checkbox" name="incisivos_clavija" value="incisivos_clavija" id="incisivos_clavija"> <label for="incisivos_clavija"> Incisivos clavija </label>
                                    <input class="box" type="checkbox" name="incisivos_superiores_dos" value="incisivos_superiores_dos" id="incisivos_superiores_dos"> <label for="incisivos_superiores_dos"> Dos inicisivos super, infer. </label>
                                    <input class="box" type="checkbox" name="duplidentado" value="duplidentado" id="duplidentado"> <label for="duplidentado"> Duplidentado </label>
                                    <input class="box" type="checkbox" name="diprotodonto" value="diprotodonto" id="diprotodonto"> <label for="diprotodonto"> Diprotodonto </label>
                                    <input class="box" type="checkbox" name="poliprotodonto" value="poliprotodonto" id="poliprotodonto"> <label for="poliprotodonto"> Poliprotodonto </label>
                                    <input class="box" type="checkbox" name="sin_dientes" value="sin_dientes" id="sin_dientes"> <label for="sin_dientes"> Sin dientes </label>
                                    <input class="box" type="checkbox" name="dientes_no_desarrollados" value="dientes_no_desarrollados" id="dientes_no_desarrollados"> <label for="dientes_no_desarrollados"> Dientes no desarrollados </label>
                                    <input class="box" type="checkbox" name="dientes_cincuenta" value="dientes_cincuenta" id="dientes_cincuenta"> <label for="dientes_cincuenta"> 50 Dientes </label>
                                    <input class="box" type="checkbox" name="dientes_tubulados" value="dientes_tubulados" id="dientes_tubulados"> <label for="dientes_tubulados"> Dientes tubulados </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Tercera fila de datos-->
                <div class="row">
                    <!--DEDOS-->
                    <div class="col-md-6 " id="Dedos">
                        <h3 style="margin-left: 20%;">Dedos</h3>

                        <div class="options">
                            <div class="row">
                                <div class="col-md-5">
                                    <input class="box" type="checkbox" name="dedos_pares" value="dedos_pares" id="dedos_pares"> <label for="dedos_pares"> Par de dedos </label>
                                    <input class="box" type="checkbox" name="dedos_impares" value="dedos_impares" id="dedos_impares"> <label for="dedos_impares"> Impar de dedos </label>
                                    <input class="box" type="checkbox" name="dedos_min_cuatro" value="dedos_min_cuatro" id="dedos_min_cuatro"> <label for="dedos_min_cuatro"> Min. cuatro dedos </label>
                                    <input class="box" type="checkbox" name="pentadactilo" value="pentadactilo" id="pentadactilo"> <label for="pentadactilo"> Pentadactilo (5 dedos) </label>
                                    <input class="box" type="checkbox" name="sindactilos" value="sindactilos" id="sindactilos"> <label for="sindactilos"> Sindáctilos (dedos pegados) </label>
                                    <input class="box" type="checkbox" name="dedos_palmeados" value="dedos_palmeados" id="dedos_palmeados"> <label for="dedos_palmeados"> Dedos palmeados</label>
                                </div>

                                <div class="col-md-4">
                                    <input class="box" type="checkbox" name="dedos_delanteros_cuatro" value="dedos_delanteros_cuatro" id="dedos_delanteros_cuatro"> <label for="dedos_delanteros_cuatro"> 4 dedos delanteros </label>
                                    <input class="box" type="checkbox" name="dedos_traseros_tres" value="dedos_traseros_tres" id="dedos_traseros_tres"> <label for="dedos_traseros_tres"> 3 dedos traseros </label>
                                    <input class="box" type="checkbox" name="dedos_delanteros_cinco" value="dedos_delanteros_cinco" id="dedos_delanteros_cinco"> <label for="dedos_delanteros_cinco"> 5 dedos delanteros </label>
                                    <input class="box" type="checkbox" name="dedos_traseros_cuatro" value="dedos_traseros_cuatro" id="dedos_traseros_cuatro"> <label for="dedos_traseros_cuatro"> 4 dedos traseros </label>
                                    <input class="box" type="checkbox" name="dedos_traseros_cinco" value="dedos_traseros_cinco" id="dedos_traseros_cinco"> <label for="dedos_traseros_cinco"> 5 dedos traseros </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Comportamiento-->
                    <div class="col-md-4 " id="Comportamiento">
                        <h3 style="margin-left: 5%;">Comportamiento</h3>

                        <div class="options">
                            <div class="row">
                                <div class="col-md-5">
                                    <input class="box" type="checkbox" name="digitigrado" value="digitigrado" id="digitigrado"> <label for="digitigrado"> Digitígrado </label>
                                    <input class="box" type="checkbox" name="plantigrado" value="plantigrado" id="plantigrado"> <label for="plantigrado"> Plantígrado </label>
                                    <input class="box" type="checkbox" name="ungulado" value="ungulado" id="ungulado"> <label for="ungulado"> Ungulado </label>
                                    <input class="box" type="checkbox" name="bipedo" value="bipedo" id="bipedo"> <label for="bipedo"> Bípedo </label>
                                    <input class="box" type="checkbox" name="nocturno" value="nocturno" id="nocturno"> <label for="nocturno"> Nocturno </label>

                                </div>

                                <div class="col-md-4">
                                    <input class="box" type="checkbox" name="macrosmatico" value="macrosmatico" id="macrosmatico"> <label for="macrosmatico"> Macrosmático</label>
                                    <input class="box" type="checkbox" name="fosorial" value="fosorial" id="fosorial"> <label for="fosorial"> Fosorial </label>
                                    <input class="box" type="checkbox" name="venenoso" value="venenoso" id="venenoso"> <label for="venenoso"> Venenoso </label>
                                    <input class="box" type="checkbox" name="ecolocacion" value="ecolocacion" id="ecolocacion"> <label for="ecolocacion"> Ecolocación </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 ">
                <div class="row">

                    <!--tabla de ordenes-->
                    <div class="col-md-6 table-wrapper-scroll-y my-custom-scrollbar">
                        <h3 class="text-center">Ordenes</h3>

                        <table class="table" id="tablaOrdenes">
                            <thead class="text-center">
                                <th>Posibles respuestas</th>
                            </thead>

                            <tbody id="ordenTbody">
                                <!--Aqui se insertan los datos-->
                            </tbody>
                        </table>
                    </div>

                    <!--Tabla de familias-->
                    <div class="col-md-6">
                        <h3 class="text-center">Familias</h3>
                        <table class="table">
                            <thead class="text-center">
                                <th>Contiene</th>
                            </thead>
                            <tbody id="familiaTbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script>
        var dinamica_id = {{$dinamica_id}};
    </script>

    <link rel="stylesheet" href="{{asset('css/Dinamicas/mamiferos.css')}}">
    <link rel="stylesheet" href="{{asset('css/popup.css')}}">
    <script type="text/javascript" src="{{asset('js/Dinamicas/Mamiferos/tau-prolog.js')}}"></script>
    <script src="{{asset('js/Dinamicas/Mamiferos/consultProlog.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/Dinamicas/cronometro.js')}}" type="text/javascript"></script>

@endsection
