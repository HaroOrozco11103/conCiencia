var segundos;
var minutos;
var spans = $(".cronometro").find("span");

//metodo para correr la hora actual
function inicializar_tiempo(){
    try{
        
        if((segundos == 0 && minutos == 0) || finDelJuego){
            
            if(!reiniciar){
                Mensaje("PUNTAJE: " + score);
                postear(score);
                limpiar();
            }
            
        }else{

            if(segundos == 0){
                segundos = 59;
                minutos--;
            }
            
            segundos--;
                
            //var spans = document.querySelector(".cronometro").querySelectorAll("span");
            
            if(minutos < 10){
                spans[0].innerHTML = "0" + minutos + " : ";
            }else{
                spans[0].innerHTML = minutos + " : ";
            }

            if(segundos<10){
                spans[1].innerHTML = "0" + segundos;
            }else{
                spans[1].innerHTML = segundos;
            }

            setTimeout(inicializar_tiempo, 1000);
        }
            }catch(error){
        console.log(error);
    }
}

function Mensaje(mensaje, puntaje){
    $('#myModal').modal();
    $('#status').html(mensaje);
    $('#puntaje').html(`puntaje final: ${puntaje}`);
}

function Mensaje(mensaje){
    $('#myModal').modal();
    $('#status').html(mensaje);
}

function postear(puntaje){
/*
    const data = new FormData();
    data.append('puntaje', score);

    fetch('/participacion', {
        headers:{
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content"),
        },
        method:'POST',
        body: data
    }).then(function(response){
        if(response.ok) {
            return response.text();
        } else {
            throw "Error en la llamada Ajax";
        }
    }).then(function(texto){
        console.log(texto);
    }).catch(function(err){
        console.log(err);
    });*/

    var dinamica_id = $('#asignatura').val();    
    console.log(dinamica_id);
    $.ajax({
        url:"/participacion",
        type:"POST",
        data: {
            marcador:puntaje, 
            dinamica:dinamica_id,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function(a){
            console.log(a);
        }
    });
}

function cargarBotonInicializar(){
    //cuando das click al boton de iniciar juego
    $("#btnCorrer").click(function (ev) { 
        if(ev.detail < 2){
            finDelJuego = true;
            reiniciar = true;
            setTimeout(inicializar_juego,1000);
        }
    });
}

const removeAccents = (str) => {
    return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}  