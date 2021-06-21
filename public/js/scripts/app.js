//------------------------Forms---------------------------------------------------------
const inputs = document.querySelectorAll(".input");

function focusFunc() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function blurFunc() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}

inputs.forEach((input) => {
    input.addEventListener("focus",focusFunc);
    input.addEventListener("blur",blurFunc);
});

function showPass(){
    var x = document.querySelector(".password");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    }
    else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

function showCheckPass(){
    var x = document.getElementById("password-confirm");
    var y = document.getElementById("hide1-check");
    var z = document.getElementById("hide2-check");

    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    }
    else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

//----------------------------------Tabs----------------------------------------------
let tabHeader = document.getElementsByClassName("tab-header")[0];
let tabIndicator = document.getElementsByClassName("tab-indicator")[0];
let tabBody = document.getElementsByClassName("tab-body")[0];
if(tabHeader != null){
    let tabsPane = tabHeader.getElementsByTagName("div");
    for(let i=0;i<tabsPane.length;i++){
        tabsPane[i].addEventListener("click",function(){
            tabHeader.getElementsByClassName("active")[0].classList.remove("active");
            tabsPane[i].classList.add("active");
            tabBody.getElementsByClassName("active")[0].classList.remove("active");
            tabBody.getElementsByClassName("tab-content")[i].classList.add("active");

            tabIndicator.style.left = `calc(calc(100% / 2) * ${i})`;
        });
    };
}

//----------------------------------Editar nombre grupo---------------------
function editarNombre(){
    var edicion = document.getElementsByClassName("edicion-nombre")[0];
    var linkEditar = edicion.getElementsByTagName("a");
    linkEditar[0].classList.remove("link-active");
    linkEditar[1].classList.add("link-active");
    $(".grupo-nombre").removeAttr("readonly");
    var input = document.getElementsByClassName("grupo-nombre");
    input[0].classList.add("editando-nombre");
}

function guardarNombre(idGrupo){
    var edicion = document.getElementsByClassName("edicion-nombre")[0];
    var linkEditar = edicion.getElementsByTagName("a");
    linkEditar[1].classList.remove("link-active");
    linkEditar[0].classList.add("link-active");
    var input = document.getElementsByClassName("grupo-nombre");
    input[0].classList.remove("editando-nombre");
    $(".grupo-nombre").attr("readonly","readonly");
    var nombreGrupo = $(".grupo-nombre").val();
    $.ajax({
        url:"/grupos/updateNombre",
        type:"POST",
        data: {
            nombreGrupo:nombreGrupo,
            idGrupo:idGrupo,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function(a){
            console.log(a);
            $("#"+idGrupo).html(nombreGrupo);
        }
    });
}

//------------------------------------------------Materias--------------------

/*Popups*/
//var btnAbrirPopup = document.querySelector('#abrir-editar');
var	overlay = document.querySelector('.overlay');
var	popupEditar = document.querySelector('.pop-up-editar');
var	btnCerrarPopup = document.querySelector('.cerrar-popup');

/*
btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popupEditar.classList.add('active');
});
*/

function btnAbrirPopup(alu, nombre, username){
  var input = document.getElementsByClassName("idAlu-popup");
  input.value = alu;
  var inputNom = document.getElementsByClassName("nomAlu-popup");
  inputNom.value = nombre;
  var inputUserN = document.getElementsByClassName("unAlu-popup");
  inputUserN.value = username;
  console.log(alu);
  console.log(nombre);
  console.log(username);
  console.log(input.value);
  console.log(inputNom.value);
  console.log(inputUserN.value);
  overlay.classList.add('active');
	popupEditar.classList.add('active');
}

btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popupEditar.classList.remove('active');
});

//var btnAbrirPopupStats = document.querySelector('#abrir-stats');
var	popupStats = document.querySelector('.pop-up-stats');
var	btnCerrarPopupStats = document.querySelector('.cerrar-popup-stats');

/*
btnAbrirPopupStats.addEventListener('click', function(){
	overlay.classList.add('active');
	popupStats.classList.add('active');
});
*/

function btnAbrirPopupStats(alu){
  overlay.classList.add('active');
  popupStats.classList.add('active');
}

btnCerrarPopupStats.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popupStats.classList.remove('active');
});
