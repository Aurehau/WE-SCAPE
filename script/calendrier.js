// Initialisation du calendrier
var calendar = new tui.Calendar('#calendar', {
    defaultView: 'month', // Afficher le calendrier par mois
    isReadOnly: true, // Rendre le calendrier en lecture seule
    useDetailPopup: false // Désactiver la popup de détails des événements
});



/* calendar.on('clickDayname', function(event) {
    var selectedDate = event.date;
    var selectedDatesInput = document.getElementById('selectedDates');
    var selectedDates = selectedDatesInput.value ? selectedDatesInput.value.split(',') : [];
    var index = selectedDates.indexOf(selectedDate);

    // Ajouter ou supprimer la date sélectionnée de la liste des dates sélectionnées
    if (index === -1) {
        selectedDates.push(selectedDate);
    } else {
        selectedDates.splice(index, 1);
    }

    // Mettre à jour la valeur du champ de formulaire caché avec les dates sélectionnées
    selectedDatesInput.value = selectedDates.join(',');
}); */


/* calendar.on('clickDayname', function(event) {
    var selectedDate = event.date;
    var selectedDatesInput = document.getElementById('selectedDates');
    var selectedDates = selectedDatesInput.value ? selectedDatesInput.value.split(',') : [];
    var index = selectedDates.indexOf(selectedDate);

    // Ajouter ou supprimer la date sélectionnée de la liste des dates sélectionnées
    if (index === -1) {
        selectedDates.push(selectedDate);
    } else {
        selectedDates.splice(index, 1);
    }

    // Mettre à jour la valeur du champ de formulaire caché avec les dates sélectionnées
    selectedDatesInput.value = selectedDates.join(',');
}); */