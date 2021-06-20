
//---------------------------------Side-nav-bar-----------------------------------------

const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navTitle = document.querySelector('.titulo-nav');
    const container = document.querySelector('.contenedor-nav');
    if(burger != null){
        burger.addEventListener('click', () => {
            var btnClass = burger.classList[1];
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
        });
    }
};

navSlide();
