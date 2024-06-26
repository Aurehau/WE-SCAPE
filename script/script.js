/********************************************* Script commun à toute les pages *********************************************/

/*************** Menu Hamburger Mobile (apparition/disparition) ***************/

let iconeOuvrir = document.querySelector(".openMenu");
let iconeFerme = document.querySelector(".closeMenu");
let menu =document.querySelector(".menuPhone");

iconeOuvrir.addEventListener("click", ouvrir);
iconeFerme.addEventListener("click", ouvrir);

function ouvrir(){
    menu.classList.toggle("apparition");
}

/*************** Sous-menu "Nos Aventures" mobile ***************/

document.addEventListener("DOMContentLoaded", function() {
    const lienDeroulant = document.querySelector('.toggle-dropdown');
    const dropDown = lienDeroulant.querySelector('.drop-down');

    // Ajoute un écouteur d'événements pour le clic sur lienDeroulant
    lienDeroulant.addEventListener('click', function() {
        // Utilise classList.toggle() pour basculer la classe 'active'
        dropDown.classList.toggle('active');
    });
});

/*************** Système de menu page détail aventures ***************/

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

/********************* Système de connexion *************************/

document.querySelector(".icone_profil").addEventListener("click", option_connexion);

function option_connexion(event){
	document.querySelector(".icone_profil").classList.toggle("vague");
	document.querySelector(".option_connexion").classList.toggle("visible");
}


/*********ajout de valeur**********/

document.getElementById("ajouterInput").addEventListener("click", creerNouvelInput);

let nbChoix=0;

function creerNouvelInput() {
    nbChoix+=1;
    // Créer un nouvel élément input
    document.querySelector(".ajoutinput"+(nbChoix-1)).innerHTML+="<div><input type='number'  id='valeur"+nbChoix+"' name='valeur"+nbChoix+"' value=''> €</div><div class=ajoutinput"+nbChoix+"></div>";

    //document.querySelector(".ajoutinput"+(nbChoix-1)).innerHTML+="<div><?php echo $formulaire->inputNumber('valeur"+nbChoix+"');?> €</div><div class=ajoutinput"+nbChoix+"></div>";
}

