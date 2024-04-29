/********************************************* Script page ajouter escape game *********************************************/

/*************** Gestion bouton fr/en ***************/

document.addEventListener('DOMContentLoaded', function() {
    // Écoute les clics sur l'élément remplirFrancais
    document.querySelector('.remplirFrancais').addEventListener('click', function() {
        // Bascule l'état du formulaire en français
        document.getElementById('formulaireFr').style.display =
            (document.getElementById('formulaireFr').style.display === 'block') ? 'none' : 'block';

        // Si le formulaire en anglais est visible, ne pas le masquer
        if (document.getElementById('formulaireEn').style.display === 'block') {
            return;
        }
    });

    // Écoute les clics sur l'élément remplirAnglais
    document.querySelector('.remplirAnglais').addEventListener('click', function() {
        // Bascule l'état du formulaire en anglais
        document.getElementById('formulaireEn').style.display =
            (document.getElementById('formulaireEn').style.display === 'block') ? 'none' : 'block';

        // Si le formulaire en français est visible, ne pas le masquer
        if (document.getElementById('formulaireFr').style.display === 'block') {
            return;
        }
    });
});