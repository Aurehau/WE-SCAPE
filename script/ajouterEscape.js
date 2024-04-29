/********************************************* Script page ajouter escape game *********************************************/

/*************** Gestion bouton fr/en ***************/

document.addEventListener('DOMContentLoaded', function() {
    // Écoute les clics sur l'élément remplirFrancais
    document.querySelector('.remplirFrancais').addEventListener('click', function() {
        // Bascule l'état du formulaire en français
        document.getElementById('formulaireFr').style.display =
            (document.getElementById('formulaireFr').style.display === 'block') ? 'none' : 'block';

        // Si le formulaire en anglais est visible, le cache
        if (document.getElementById('formulaireEn').style.display === 'block') {
            document.getElementById('formulaireEn').style.display = 'none';
        }
    });

    // Écoute les clics sur l'élément remplirAnglais
    document.querySelector('.remplirAnglais').addEventListener('click', function() {
        // Bascule l'état du formulaire en anglais
        document.getElementById('formulaireEn').style.display =
            (document.getElementById('formulaireEn').style.display === 'block') ? 'none' : 'block';

        // Si le formulaire en français est visible, le cache
        if (document.getElementById('formulaireFr').style.display === 'block') {
            document.getElementById('formulaireFr').style.display = 'none';
        }
    });
});