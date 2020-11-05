$(document).ready(inicializar());

var listaPalabras;
var indexP;
var palabraCompleta;

function inicializar(){
    indexP = 0;
    listaPalabras = [];
    palabraCompleta = false;

    leerJson();

    crearEspacios();
    imprimirBotones();
}


function crearEspacios(){    
    indexP = Math.floor(Math.random() * listaPalabras.length);

    for (let i = 0; i < listaPalabras[indexP].length; i++) {
        $(".palabras").append('<h2 class="letra">_</h2>');
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
                listaPalabras = json["fisica"];
            }
        });    

    } catch (error) {
        console.log(error);
    }   
}

function verificar(letra){
    var value = letra.value.toLowerCase();
    var palabra = listaPalabras[indexP];

    //alert(palabra + "\n"+ value);

    palabraCompleta = true;

    var campos = $('.palabras').find(".letra");

    for (let i = 0; i < palabra.length; i++) {     
        if(value == palabra.charAt(i))
            campos[i].innerHTML = value;
            
        if(campos[i].innerHTML == '_')
            palabraCompleta = false;
    }
    
    if(palabraCompleta)
        alert("GANASTE!");
}


///////////////////////////////////////////////////////////////////////////////////////////////////////
                        /* Eventos*/
//////////////////////////////////////////////////////////////////////////////////////////////////////

$(".botones").on("click", function () {
    this.setAttribute('disabled', true);
    verificar(this);
    
});


