/********************************************* Script page ajouter escape game *********************************************/

/*************** Gestion bouton fr/en ***************/

document.addEventListener('DOMContentLoaded', function() {
    // Écoute les clics sur l'élément remplirFrancais
    document.querySelector('.remplirFrancais').addEventListener('click', function() {
        // Affiche le formulaire en français
        document.getElementById('formulaireFr').style.display = 'block';
        // Masque le formulaire en anglais
        document.getElementById('formulaireEn').style.display = 'none';
    });

    // Écoute les clics sur l'élément remplirAnglais
    document.querySelector('.remplirAnglais').addEventListener('click', function() {
        // Affiche le formulaire en anglais
        document.getElementById('formulaireEn').style.display = 'block';
        // Masque le formulaire en français
        document.getElementById('formulaireFr').style.display = 'none';
    });
});