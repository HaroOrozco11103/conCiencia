$(document).ready(function(){
    init();
    inicializar();
});

var listaPalabras;
var indexP;
var vidas;
var score = 0;
var aciertos = 1;

function inicializar(){
    imprimirBotones();
    $(".botones").attr("disabled", true);
}

async function reiniciar(){
    $(".botones").attr("disabled", false);
    leerJson().then(() =>{
        crearEspacios();
    });  
    
}

function limpiar(){
    score = 0;
    aciertos = 1;
    indexP = 0;
    vidas=6;
    listaPalabras = [];
    $(".botones").attr("disabled", true);
    $(".letra").remove();
    ocultarPiezas();
}


function crearEspacios(){    
    indexP = Math.floor(Math.random() * listaPalabras.length);

    for (let i = 0; i < listaPalabras[indexP].length; i++) {
        $(".palabras").append('<label class="letra">_</label>');
    }

}

//Imprimimos el abecedario usando ASCII
function imprimirBotones(){

    for (let i = 65; i < 91; i++) {

        $(".alfabeto").append('<input class="botones" type="button" value ="'+ String.fromCharCode(i)+'">');    

        if(i == 78)
            $(".alfabeto").append('<input class="botones" type="button" value ="Ñ">');
    }
       
}

async function leerJson(){
    var materia = removeAccents($("#asignatura option:selected").text().toLowerCase().trim());
    try {
        $.ajax({
            url: `${json}/Ahorcado/palabras.json`,
            dataType: "json",
            async: false,
            success: function (json) {
                listaPalabras = json[materia];
            }
        });    

    } catch (error) {
        console.log(error);
    }   
}

function verificar(letra){
    var palabra = listaPalabras[indexP];

    var letraEncontrada = false;
    var palabraCompleta = true;

    var campos = $('.palabras').find(".letra");

    for (let i = 0; i < palabra.length; i++) {     
        if(letra == palabra.charAt(i)){
            campos[i].innerHTML = letra;
            letraEncontrada = true;
            score += 1 * aciertos;
            aciertos++;

        }
            
        if(campos[i].innerHTML == '_')
            palabraCompleta = false;
    }
    
    if(!letraEncontrada){
        vidas--;
        acierto = 1;
        mostrarPieza(vidas);

        if(vidas == 0){
            Mensajes("¡ ¡ ¡ PERDISTE ! ! ! :(", score)
            postear(score);
            limpiar();
            return;
        }
    }

    if(palabraCompleta){
        Mensajes("¡ ¡ ¡ GANASTE! ! ! !", score);
        postear(score);
        limpiar();
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////
                        /* Eventos*/
//////////////////////////////////////////////////////////////////////////////////////////////////////


$(".alfabeto").on("click", ".botones",function () {
    this.setAttribute('disabled', true);
    
    var letra = this.value.toLowerCase();
    verificar(letra);
});

$(document).keypress(function (e) {
    var boton =  $(`.alfabeto .botones[value="${e.key.toUpperCase()}"]`);
    
    if(!boton.prop('disabled')){
        
        boton.attr('disanuevaParticipacion();bled', true);
        var letra = e.key.toLowerCase();
        verificar(letra);
    }
    
});

$("#btnCorrer").on("click",function (e) { 
    limpiar();
    reiniciar();
    nuevaParticipacion();
});
