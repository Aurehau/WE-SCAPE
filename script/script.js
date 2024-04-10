/*************** Menu Hamburger Téléphone (apparition/disparition) ***************/

let iconeOuvrir = document.querySelector(".openMenu");
let iconeFerme = document.querySelector(".closeMenu");
let menu =document.querySelector(".menuPhone");

iconeOuvrir.addEventListener("click", ouvrir);
iconeFerme.addEventListener("click", ouvrir);

function ouvrir(){
    menu.classList.toggle("apparition");
}

/*************** Script template aventure : menu ***************/

window.addEventListener("scroll", menuDetails, { passive: true });

menuDetails();

function menuDetails() {
    let divs = document.querySelectorAll("[data-menu]");
    
    /* Remise à zéro des couleurs du menu */
    document.querySelectorAll(".menuAventure>ul>li>a").forEach(e => e.classList.remove("view"));

    /* On cherche sur chaque div, si elle est active */
    for(let i=0 ; i<divs.length ; i++) {
        let e = divs[i];

        let id = "#" + e.dataset.menu;
        if(e.getBoundingClientRect().top >= 0) {
            document.querySelector(id).classList.add("view");
            return;
        }
    }
}