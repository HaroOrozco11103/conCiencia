
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
    visibilidadNav = container.classList[1]
    if( visibilidadNav == "nav-oculta")
    {
        container.classList.remove('nav-oculta');
        container.classList.add("nav-visible");
    }
    if( visibilidadNav == "nav-visible"){
        container.classList.remove("nav-visible");
        container.classList.add('nav-oculta');
    }

    nav.classList.toggle('nav-active');
    navTitle.classList.toggle('nav-active');
    
};
