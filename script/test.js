
document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		locale: 'fr',
	  initialView: 'dayGridMonth',
	  events: contenuVariable,
	eventClick: function(info) {
            // Afficher les détails de l'événement dans la fenêtre modale
            var modal = document.getElementById('eventModal');
            var modalIsVisible = (modal.style.display === 'block');
			ZoneTrad(localStorage.getItem('langue'));

            // Afficher les détails de l'événement
			titre="phpmyadmin-game-"+info.event.extendedProps.idEscape+"-titre";
			adresse="phpmyadmin-version-"+info.event.extendedProps.idVersion+"-adresse";

			document.getElementById('eventTitre').classList.add(titre);
            document.getElementById('eventDebut').innerHTML = info.event.start;
			document.getElementById('eventDure').innerHTML = info.event.extendedProps.dure;
			document.getElementById('eventAdresse').classList.add(adresse);
			document.getElementById('eventPostal').innerHTML = info.event.extendedProps.code_postal;
			document.getElementById('eventVille').innerHTML = info.event.extendedProps.ville;
			
		console.log(info.event.start);
            // Si la fenêtre modale est déjà ouverte, fermez-la
            if (modalIsVisible) {
                closeModal();
            } else {
                modal.style.display = 'block';
            }
	}
	});
	calendar.render();
});

function closeModal() {
	var modal = document.getElementById('eventModal');
	modal.style.display = 'none';
}
