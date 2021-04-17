$("document").ready(run());

var cartas = [];
var segundos;
var minutos;

var score;
var aciertosContinuos;

var reiniciar;
var finDelJuego;
var paresFaltantes;

var tapa;

let parCartas = [];

//Inicializar aplicacion
function run(){        
    try {
        socre = 0;
        aciertosContinuos = 0
        reiniciar = false;
        finDelJuego = false;
    }
    catch(error){
        console.log(error);
    }
}

function inicializar_juego(){
    minutos = 2;
    segundos = 10;
    score = 0;
    finDelJuego = false;
    reiniciar = false;
    parCartas.length = 0;

    getTapa();
    
    $('.score').html("score: "+ score);
    
    leerJson();
    $('.carta').remove();
    paresFaltantes = cartas.length; 

    revolver();

    inicializar_tiempo();
    
}

function getTapa(){
    
    switch ($("#asignatura option:selected").index()){
        case 0: 
            tapa = `${image}/cartas/niña-ciencia.png`;  
            break;
        case 1: 
            tapa = `${image}/cartas/chico-artes.jpg`;
            break;
        case 2: 
            tapa = `${image}/cartas/arqueologa.jpg`;
            break;
    }
}

//metodo para correr la hora actual
function inicializar_tiempo(){
    try{
        var spans = $(".cronometro").find("span");
        
        if((segundos == 0 && minutos == 0) || finDelJuego == true){
            
            if(reiniciar == false){
                alert("FIN DEL JUEGO! \n   PUNTAJE:" + score);
                $('.carta').remove();
                $('.score').html("score: 0");
                spans[1].innerHTML = "00 : ";
                spans[2].innerHTML = "00";
            }
            
        }else{

            if(segundos == 0){
                segundos = 59;
                minutos--;
            }
            
            
            segundos--;
                
            //var spans = document.querySelector(".cronometro").querySelectorAll("span");
            
            if(minutos < 10){
                spans[1].innerHTML = "0" + minutos + " : ";
            }else{
                spans[1].innerHTML = minutos + " : ";
            }

            if(segundos<10){
                spans[2].innerHTML = "0" + segundos;
            }else{
                spans[2].innerHTML = segundos;
            }

            setTimeout(inicializar_tiempo, 1000);
        }
            }catch(error){
        console.log(error);
    }
}

//Añadimos las cartas e insertamos las imagenes
function revolver(){
    let random = 0; 
    
    let tamanio = cartas.length;

    let posicionesLlenas = new Array(tamanio);
    posicionesLlenas.fill(0);

    let numeroInsertado=false;
    for(let i=0; i<tamanio*2; i++){
        
        do{
            numeroInsertado=false;
            random = Math.floor(Math.random() * tamanio)
            if(posicionesLlenas[random]!=2)
            {
                posicionesLlenas[random]++;

                $('.contenedor').append(`<div id="${i}c" class="carta">
                                            <img src="${tapa}" class="tapa">
                                            <img src="${cartas[random]['imagen']}" class="cara"> 
                                            <input id="${i}" type="hidden" value="${cartas[random]['value']}">
                                        </div>`);                                        
                numeroInsertado=true;
            }
        }while(!numeroInsertado);
    }
}

//obtener la listas de imagenes de json
function leerJson(){
    try{
                
        //AJAX sincrono
        $.ajax({
            url: `${json}/Memorama/cartas.json`,
            dataType: 'json',
            async: false,
            success: function (json) {
                cartas = json[$("#asignatura").val()];
            }
        });
        
        /* JQuery asincrono
        $.getJSON("cartas.json", function (json) {
            setCartas(json["fisica"]);
        });*/
        
    }catch(error){
        console.log(error);
    }
}

//Verificamos las posibles respuestas
function verificar(carta){
    if(finDelJuego == false){   
        carta.disabled = true;

        if(parCartas.length == 0){
            rotar(carta);
            parCartas[0] = carta;
        }else{
            parCartas[1] = carta;
            let valorCartas = [];
        
            valorCartas[0] = parCartas[0].querySelector("input");
            valorCartas[1] = parCartas[1].querySelector("input");

            rotar(carta);

                //Si es que sale par
                if(valorCartas[0].value == valorCartas[1].value){
                    console.log("Es par");
                    
                    paresFaltantes--;
                    aciertosContinuos++;

                    score += 5 * aciertosContinuos;

                    parCartas[0].removeAttribute("onclick");
                    parCartas[1].removeAttribute("onclick");

                    if(paresFaltantes == 0){
                        finDelJuego = true;
                        var tiemporRestante = 0;
                        tiemporRestante += (minutos*60) + segundos; 
                        score += tiemporRestante;
                    }

                    $('.score').html("score: "+ score);

                }else{
                    
                    console.log("No es par");
                    rotar(parCartas[0]);
                    rotar(parCartas[1]);
                    aciertosContinuos = 0;
                }

                parCartas.length = 0;
        }
    }
    
}

//Rotar cartas
function rotar(carta){

    //$("#"+carta.id).toggleClass("rotar");
    if($("#"+carta.id).hasClass("rotar")){
    
        setTimeout(() => {
            $("#"+carta.id).removeClass("rotar");
            carta.disabled = false;
        }, 1000);
    
    }else{
        $("#"+carta.id).addClass("rotar");    
    }    
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                /* Eventos*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//cuando das click al boton de iniciar juego
$("#btnCorrer").click(function (ev) { 
    if(ev.detail < 2){
        finDelJuego = true;
        reiniciar = true;
        setTimeout(inicializar_juego,1000);
    }
});

$('.contenedor').on('click','.carta', function(ev){
    verificar(this);
});

