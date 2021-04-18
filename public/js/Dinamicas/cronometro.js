var segundos;
var minutos;
var spans = $(".cronometro").find("span");

//metodo para correr la hora actual
function inicializar_tiempo(){
    try{
        
        if((segundos == 0 && minutos == 0) || finDelJuego){
            
            if(!reiniciar){
                alert("FIN DEL JUEGO! \n   PUNTAJE:" + score);
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
