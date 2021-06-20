
//---------------------------------Side-nav-bar-----------------------------------------

function navSlide(){
    const burger = document.getElementById('btn-nav');
    const nav = document.querySelector('.nav-links');
    const navTitle = document.querySelector('.titulo-nav');
    const container = document.querySelector('.contenedor-nav');
    var btnClass = burger.classList[1];
    console.log("hola");
    if( btnClass == "fa-times"){
        burger.classList.remove("fa-times");
        burger.classList.add("fa-bars");
    }
    if( btnClass == "fa-bars"){
        burger.classList.remove("fa-bars");
        burger.classList.add("fa-times");
    }

    nav.classList.toggle('nav-active');
    navTitle.classList.toggle('nav-active');
    container.classList.toggle('nav-oculta');
    container.style.transition = 'all 5s';
};
