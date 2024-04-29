/********************************************* Script page ajouter escape game *********************************************/

/*************** Gestion bouton fr/en ***************/

document.addEventListener('DOMContentLoaded', function() {
    // Selection formulaire en français
    document.querySelectorAll('.remplirFrancais').forEach(function(element) {
        element.addEventListener('click', function() {
            // Affiche le formulaire en francais
            document.querySelectorAll('[id^="formulaireFr"]').forEach(function(formulaire) {
                formulaire.style.display = (formulaire.style.display === 'block') ? 'none' : 'block';
            });

            // Pouvoir afficher les deux formulaires en mm temps si les deux boutons ont été séléctionnés
            if (document.querySelector('[id^="formulaireEn"]').style.display === 'block') {
                return;
            }
        });
    });

    // Selection formulaire en anglais
    document.querySelectorAll('.remplirAnglais').forEach(function(element) {
        element.addEventListener('click', function() {
            // Affiche le formulaire en anglais
            document.querySelectorAll('[id^="formulaireEn"]').forEach(function(formulaire) {
                formulaire.style.display = (formulaire.style.display === 'block') ? 'none' : 'block';
            });

            // Pouvoir afficher les deux formulaires en mm temps si les deux boutons ont été séléctionnés
            if (document.querySelector('[id^="formulaireFr"]').style.display === 'block') {
                return;
            }
        });
    });
});
