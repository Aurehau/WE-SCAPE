
document.addEventListener('DOMContentLoaded', function() {
	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		locale: 'fr',
	  initialView: 'dayGridMonth',
	  events: contenuVariable,
	eventClick: function(info) {
            // Afficher les détails de l'événement dans la fenêtre modale
            var modal = document.getElementById('eventModal');
            var eventDetails = document.getElementById('eventDetails');
            var modalIsVisible = (modal.style.display === 'block');

            // Afficher les détails de l'événement
            eventDetails.innerHTML = info.event.extendedProps.description;

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
