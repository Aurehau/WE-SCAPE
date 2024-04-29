/********************************************* Script page ajouter escape game *********************************************/

/*************** Gestion bouton fr/en ***************/


function afficherFormulaire(langue) {
    // Cache tous les formulaires
    document.getElementById('formulaireFr').style.display = 'none';
    document.getElementById('formulaireEn').style.display = 'none';

    // Affiche le formulaire correspondant à la langue sélectionnée
    if (langue === 'fr') {
        document.getElementById('formulaireFr').style.display = 'block';
    } else if (langue === 'en') {
        document.getElementById('formulaireEn').style.display = 'block';
    }
}