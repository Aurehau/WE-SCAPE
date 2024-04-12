// choix langue
document.querySelectorAll("#langues>div").forEach(div => {
    div.addEventListener("click",function(){
        ZoneTrad(this.dataset.trad);
    });
});

//récupération traduction
async function RecupTrad(){
    let Recdonnees = await fetch("../modele/bdd.json");
    Recdonnees = await Recdonnees.json();
    return Recdonnees;
}

//zone a traduire 
async function ZoneTrad(langue){
    let donnees = await RecupTrad();

    traduction(langue, donnees.header);
    //traduction(langue, donnees.footer);
    traductioncomplexe(langue, donnees, "footer");
}

//affichage de la traduction
function traduction(langue, donnee){
    for (let key in donnee) {
        document.querySelectorAll(`.${key}`).forEach(nomClass => {
            nomClass.innerText = donnee[key][langue];
        });
        
    }
}

function traductioncomplexe(langue, donnee, branche){
    let table=[branche];
    donnee= donnee[branche];
    //console.log(donnee);
    
    boucle(langue, donnee, table);


/*         document.querySelectorAll(`.${key}`).forEach(nomClass => {
            nomClass.innerText = donnee[key][langue];
        }); */
        
    
}

function boucle(langue, donnee, table){
    //console.log(Object.keys(donnee));
    tablekey=Object.keys(donnee);
    if (tablekey.toString()=="fr,en") {
        
        //console.log('chat');
        laclass=table.toString().replace(/,/g, "-");

        console.log(laclass);    //permet de voir les class css

        document.querySelectorAll(`.${laclass}`).forEach(nomClass => {
            nomClass.innerText = donnee[langue];});

    } else{
        for (let key in donnee) {
            table.push(key);
            //console.log(table);
            boucle(langue, donnee[key], table);
            table.pop();
        }
    }
}


ZoneTrad("fr");