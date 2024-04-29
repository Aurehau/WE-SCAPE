/********************************************* Script page ajouter escape game *********************************************/

/*************** Gestion bouton fr/en ***************/

document.addEventListener('DOMContentLoaded', function() {
    // Selection formulaire en français
    document.querySelector('.remplirFrancais').addEventListener('click', function() {

        // Affiche le formulaire en francais
        document.getElementById('formulaireFr').style.display =
            (document.getElementById('formulaireFr').style.display === 'block') ? 'none' : 'block';

        // Pouvoir afficher les deux formulaires en mm temps si les deux boutons ont été séléctionnés
        if (document.getElementById('formulaireEn').style.display === 'block') {
            return;
        }

    });

    // Selection formulaire en anglais
    document.querySelector('.remplirAnglais').addEventListener('click', function() {

        // Affiche le formulaire en anglais
        document.getElementById('formulaireEn').style.display =
            (document.getElementById('formulaireEn').style.display === 'block') ? 'none' : 'block';

        // Pouvoir afficher les deux formulaires en mm temps si les deux boutons ont été séléctionnés
        if (document.getElementById('formulaireFr').style.display === 'block') {
            return;
        }
    });
});