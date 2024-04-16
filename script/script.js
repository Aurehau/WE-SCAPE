
/*************** Menu Hamburger Mobile (apparition/disparition) ***************/

let iconeOuvrir = document.querySelector(".openMenu");
let iconeFerme = document.querySelector(".closeMenu");
let menu =document.querySelector(".menuPhone");

iconeOuvrir.addEventListener("click", ouvrir);
iconeFerme.addEventListener("click", ouvrir);

function ouvrir(){
    menu.classList.toggle("apparition");
}

/*************** Sous-menu aventures mobile ***************/

document.addEventListener("DOMContentLoaded", function() {
    const lienDeroulant = document.querySelector('.toggle-dropdown');
    const dropDown = lienDeroulant.querySelector('.drop-down');

    // Ajoute un écouteur d'événements pour le clic sur lienDeroulant
    lienDeroulant.addEventListener('click', function() {
        // Utilise classList.toggle() pour basculer la classe 'active'
        dropDown.classList.toggle('active');
    });
});

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


/*********************visibilité option de connexion*************************/

document.querySelector(".icone_profil").addEventListener("click", option_connexion);


function option_connexion(event){
	document.querySelector(".icone_profil").classList.toggle("vague");
	document.querySelector(".option_connexion").classList.toggle("visible");
}