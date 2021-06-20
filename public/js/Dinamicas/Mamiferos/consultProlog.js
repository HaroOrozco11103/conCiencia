var listQuery = new Set();
var finalizado = false;
var info = '';
var imagen = '';
var listaCaracteristicas = [];
var score = 0;

$(document).ready(function(){
    nuevaParticipacion();
    score = 0;
    $('.box').prop('checked', false);
    imprimirCaracteristicas();
});


//Consulta prolog    
async function runProlog (query){

    return new Promise((resolve, reject) => {
        var session = pl.create();

        session.consult(`${json}/Mamiferos/prolog.pl`,{
            success: function(){
                console.log('Leyo el archivo');
                
                session.query(`${query} nl.`,{
                    success: function(){
                        console.log('Entendio el query');
                        session.answers(show(resolve));        
                    },
                    error: function(err){console.log("No pudo leer bien el query");}
                });
            },
            error: function(err){console.log("No se encontro el archivo");}
        });

    });
    
}


//Obtiene las respuestas con un callback y las imprime
function show(resolve){
    console.log("Buscando respuestas");

    return function(answer){
        if(pl.type.is_substitution(answer)){
            var data = answer.lookup("X");
            if(consultOrden && data != null){
                $("#ordenTbody").append(`<tr class="ordenData"> <td> ${data} </td> </tr>`);
            }
        }else{
            resolve();
        }
    };
}



/////////////////////////////////////////////////////////////////////////////////////////////////
                                        /* EVENTOS*/
/////////////////////////////////////////////////////////////////////////////////////////////////

//Evento para obtener el valor del checkbox seleccionados
$(".box").click(function(event){
    this.disabled = true;
      
    var value = this.value;
    var query = "";
    
    consultOrden = true;
    finalizado = false;

    $("#ordenTbody").empty();

    this.checked ? listQuery.add(`caracteristica(X,${value}),`) : listQuery.delete(`caracteristica(X,${value}),`);

    listQuery.forEach(data => {
        query += data; 
    });  

    runProlog(query).then((response) => {
        this.disabled = false;
    });
    
});

//Mostrar leyenda de la descipcion
$("input[type=checkbox] + label").hover(function(){
    
    var box = this.getAttribute('for').trim();
    var popup = document.getElementById("myPopup");
    popup.innerHTML = listaCaracteristicas[box];
    popup.classList.toggle("show");
});


//Creamos un evento para los rows de la tabla ordenes
$('#tablaOrdenes').on('click', '.ordenData > td', function(){
    var orden = this.innerHTML;
    consultOrden = false;

    leerJson(orden);

    $('#myModal').addClass('modal-taxo');
    
    $('#myModalTitle').html(orden.toUpperCase());
    $('#modal-body').empty();
    
    $('#modal-body').html(`
        <div class ='info'> ${info}</div>
        <img src='${image}/mamiferos/${imagen}' alt='${orden}'>
    `);
    
    $('#myModal').modal();   

    score += 10;
    postear(score);
});
   

function leerJson(orden){
    orden = orden.trim();
    $.ajax({
        url: `${json}/Mamiferos/mamiferos.json`,
        dataType: 'json',
        async: false,
        success: function (json) {
            info = json[orden]['info'];
            imagen = json[orden]['imagen'];
        },
        error: function(err){
            console.log(err);
        }
    });  
}

function imprimirCaracteristicas(){
    $.ajax({
        url: `${json}/Mamiferos/caracteristicas.json`,
        dataType: 'json',
        async: false,
        success: function (json) {
            listaCaracteristicas = json;
            
            $('#myModalTitle').html('INSTRUCCIONES');
            $('#modal-body').html(json['instrucciones']);
            $('#myModal').modal();

        },
        error: function(err){
            console.log(err);
        }
    });
}
