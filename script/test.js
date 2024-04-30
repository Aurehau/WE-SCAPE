document.addEventListener('DOMContentLoaded', function() {
	// Récupérer les données de réservation de l'utilisateur depuis votre source de données
	var reservations = [
	  { id: '1', title: 'Réservation 1', start: '2024-04-30T09:00:00', end: '2024-04-30T12:00:00' },
	  { id: '2', title: 'Réservation 2', start: '2024-05-02T14:00:00', end: '2024-05-02T16:00:00' },
	  // Ajouter d'autres réservations selon votre source de données
	];
  
	// Initialiser le calendrier Toast UI avec les données de réservation
	var calendar = new tui.Calendar(document.getElementById('calendar'), {
	  defaultView: 'week', // Afficher le calendrier par semaine
	  taskView: false, // Désactiver la vue des tâches
	  scheduleView: ['time'], // Activer la vue par heure
	  useCreationPopup: false, // Désactiver la création de nouveaux événements
	  useDetailPopup: false, // Désactiver les détails de l'événement au clic
	  template: {
		time: function(schedule) {
		  return getTimeTemplate(schedule, true);
		}
	  }
	});
  
	// Ajouter les réservations au calendrier
	calendar.createSchedules(reservations);
  });
  
  // Fonction pour formater le contenu de l'événement
  function getTimeTemplate(schedule, isAllDay) {
	var html = [];
  
	html.push('<strong>' + schedule.title + '</strong><br>');
	html.push('<span>' + moment(schedule.start.getTime()).format('HH:mm') + ' - ' + moment(schedule.end.getTime()).format('HH:mm') + '</span>');
  
	return html.join('');
  }