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
    input.addEventListener("focus", focusFunc);
    input.addEventListener("blur", blurFunc);
});

function showPass() {
    var x = document.querySelector(".password");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

function showCheckPass() {
    var x = document.getElementById("password-confirm");
    var y = document.getElementById("hide1-check");
    var z = document.getElementById("hide2-check");

    if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

//----------------------------------Tabs----------------------------------------------
let tabHeader = document.getElementsByClassName("tab-header")[0];
let tabIndicator = document.getElementsByClassName("tab-indicator")[0];
let tabBody = document.getElementsByClassName("tab-body")[0];
if (tabHeader != null) {
    let tabsPane = tabHeader.getElementsByTagName("div");
    for (let i = 0; i < tabsPane.length; i++) {
        tabsPane[i].addEventListener("click", function () {
            tabHeader.getElementsByClassName("active")[0].classList.remove("active");
            tabsPane[i].classList.add("active");
            tabBody.getElementsByClassName("active")[0].classList.remove("active");
            tabBody.getElementsByClassName("tab-content")[i].classList.add("active");

            tabIndicator.style.left = `calc(calc(100% / 2) * ${i})`;
        });
    };
}

//----------------------------------Editar nombre grupo---------------------
function editarNombre() {
    var edicion = document.getElementsByClassName("edicion-nombre")[0];
    var linkEditar = edicion.getElementsByTagName("a");
    linkEditar[0].classList.remove("link-active");
    linkEditar[1].classList.add("link-active");
    $(".grupo-nombre").removeAttr("readonly");
    var input = document.getElementsByClassName("grupo-nombre");
    input[0].classList.add("editando-nombre");
}

function guardarNombre(idGrupo) {
    var edicion = document.getElementsByClassName("edicion-nombre")[0];
    var linkEditar = edicion.getElementsByTagName("a");
    linkEditar[1].classList.remove("link-active");
    linkEditar[0].classList.add("link-active");
    var input = document.getElementsByClassName("grupo-nombre");
    input[0].classList.remove("editando-nombre");
    $(".grupo-nombre").attr("readonly", "readonly");
    var nombreGrupo = $(".grupo-nombre").val();
    $.ajax({
        url: "/grupos/updateNombre",
        type: "POST",
        data: {
            nombreGrupo: nombreGrupo,
            idGrupo: idGrupo,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (a) {
            console.log(a);
            $("#" + idGrupo).html(nombreGrupo);
        }
    });
}

//----------------------------------------Popups
var overlayCrear = document.querySelector('.overlay-crear');
var popupCrear = document.querySelector('.pop-up-crear');
var btnCerrarPopupCrear = document.querySelector('.cerrar-popup-crear');

function btnAbrirPopupCrear() {
    overlayCrear.classList.add('active');
    popupCrear.classList.add('active');
}

if (btnCerrarPopupCrear != null) {
btnCerrarPopupCrear.addEventListener('click', function (e) {
    e.preventDefault();
    overlayCrear.classList.remove('active');
    popupCrear.classList.remove('active');
});
}

//----------------------------------------Popups Inscribir
var overlayInscribir = document.querySelector('.overlay-inscribir');
var popupInscribir = document.querySelector('.pop-up-inscribir');
var btnCerrarPopupInscribir = document.querySelector('.cerrar-popup-inscribir');

function btnAbrirPopupInscribir() {
    overlayInscribir.classList.add('active');
    popupInscribir.classList.add('active');
}
if (btnCerrarPopupInscribir != null) {
    btnCerrarPopupInscribir.addEventListener('click', function (e) {
        e.preventDefault();
        overlayInscribir.classList.remove('active');
        popupInscribir.classList.remove('active');
    });
}


//var btnAbrirPopup = document.querySelector('#abrir-editar');
var overlayEditar = document.querySelector('.overlay-editar');
var popupEditar = document.querySelector('.pop-up-editar');
var btnCerrarPopupEditar = document.querySelector('.cerrar-popup-editar');

/*
btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popupEditar.classList.add('active');
});
*/

function btnAbrirPopupEditar(alu, nombre, username) {
    document.querySelector(".idAlu-popup").value = alu;
    document.querySelector(".nomAlu-popup").value = nombre;
    document.querySelector(".unAlu-popup").value = username;
    overlayEditar.classList.add('active');
    popupEditar.classList.add('active');
}

if (btnCerrarPopupEditar != null) {
    btnCerrarPopupEditar.addEventListener('click', function (e) {
        e.preventDefault();
        overlayEditar.classList.remove('active');
        popupEditar.classList.remove('active');
    });
}

//var btnAbrirPopupStats = document.querySelector('#abrir-stats');
var overlayStats = document.querySelector('.overlay-stats');
var popupStats = document.querySelector('.pop-up-stats');
var btnCerrarPopupStats = document.querySelector('.cerrar-popup-stats');

/*
btnAbrirPopupStats.addEventListener('click', function(){
	overlay.classList.add('active');
	popupStats.classList.add('active');
});
*/

function btnAbrirPopupStats(alu, nombre) {
    $('.btn-clasificar').show();
    $(".nom-alu-clasf").empty();
    document.querySelector(".idAluStats-popup").value = alu;
    document.querySelector(".idAluStatsMat-popup").value = alu;
    document.querySelector(".nomAluStats-popup").value = nombre;
    overlayStats.classList.add('active');
    popupStats.classList.add('active');
}

if (btnCerrarPopupStats != null) {
    btnCerrarPopupStats.addEventListener('click', function (e) {
        e.preventDefault();
        overlayStats.classList.remove('active');
        popupStats.classList.remove('active');
    });
}

//Clasificar alumno popup
function clasificarAlumno() {
    var nombre = $(".idAluStats-popup").val();
    $.ajax({
        url: "/alumnos/clasificacion",
        type: "POST",
        data: {
            alumno: nombre,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (a) {
            $('.btn-clasificar').hide();
            $(".nom-alu-clasf").html(`<div style="text-align: center">
                    <b>Este alumno destaca en ${a}</b> 
                <div>
            `);
        },
        error: function (a) {
            console.log("error: " + a);
        }
    });
}

//Set porcentaje default

function setAllSelects() {
    var selects = document.getElementsByName("porcentaje");

    for(var i = (selects.length - 1); i >= 0; i--)
    {
        selects[i].value = 1;
    }
}
setAllSelects();
