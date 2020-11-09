$(document).ready(inicializar());

var listaPalabras;
var indexP;
var palabraCompleta;
var vidas;

function inicializar(){
    imprimirBotones();
    $(".botones").attr("disabled", true);
}

function reiniciar(){
    limpiar();
    leerJson();
    crearEspacios();
    
}

function limpiar(){
    listaPalabras = [];
    indexP = 0;
    palabraCompleta = false;
    vidas=6;
    $(".botones").attr("disabled", false);
    $(".letra").remove();
    ocultarPiezas();
}


function crearEspacios(){    
    indexP = Math.floor(Math.random() * listaPalabras.length);

    for (let i = 0; i < listaPalabras[indexP].length; i++) {
        $(".palabras").append('<font class="letra">_</font>');
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

function leerJson(){
    try {
        $.ajax({
            url: "palabras.json",
            dataType: "json",
            async: false,
            success: function (json) {
                listaPalabras = json[$("#asignatura").val()];
            }
        });    

    } catch (error) {
        console.log(error);
    }   
}

function verificar(letra){
    var value = letra.value.toLowerCase();
    var palabra = listaPalabras[indexP];

    var letraEncontrada = false;
    //alert(palabra + "\n"+ value);

    palabraCompleta = true;

    var campos = $('.palabras').find(".letra");

    for (let i = 0; i < palabra.length; i++) {     
        if(value == palabra.charAt(i)){
            campos[i].innerHTML = value;
            letraEncontrada = true;
        }
            
        if(campos[i].innerHTML == '_')
            palabraCompleta = false;
    }
    
    if(!letraEncontrada){
        vidas--;
        mostrarPieza(vidas);

        if(vidas == 0){
            setTimeout(function(){
                alert("¡PERDISTE!");
                reiniciar();
            },100);
        }
    }

    if(palabraCompleta){
        alert("¡GANASTE!");
        reiniciar();
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////
                        /* Eventos*/
//////////////////////////////////////////////////////////////////////////////////////////////////////

$(".botones").on("click", function () {
    this.setAttribute('disabled', true);
    verificar(this);
    
});

$("#btnCorrer").on("click",function (e) { 
    reiniciar();
});