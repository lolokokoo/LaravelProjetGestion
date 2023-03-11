@extends('layouts.master')

@section("contenu")

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                //Style du calendrier en général
                initialView: 'dayGridMonth', // Vue initiale du calendrier
                initialDate: '2023-01-01', // Date initiale du calendrier
                finalDate: '2023-12-31', // Date finale du calendrier
                validRange: {
                    start: '2023-01-01',
                    end: '2023-12-31'
                }, // Plage de dates valides pour le calendrier
                displayEventEnd: false, // Masquer l'heure de fin des événements
                themeSystem: 'bootstrap5', // Thème du calendrier
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaine',
                    day: 'Jour',
                    list: 'Agenda'
                }, // Textes pour les boutons du calendrier
                customButtons: {
                    myCustomButton: {
                        text: 'Test Bouton',
                        className: 'btn btn-success',
                        click: function() {
                            alert('Alerte Test!');
                        }
                    }
                }, // Bouton personnalisé pour le calendrier
                headerToolbar: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                }, // Configuration de la barre d'outils du calendrier
                height: 650, // Hauteur du calendrier
                locale: 'fr', // Langue du calendrier
                stickyHeaderDates: true, // Épingler les dates de la barre d'en-tête
                expandRows: true, // Étendre les rangées pour remplir l'espace vide
                weekends: true, // Afficher les week-ends
                dayHeaders: true, // Afficher les en-têtes de jour
                dayHeaderFormat: { weekday: 'short' }, // Format des en-têtes de jour
                //Style week/day
                slotDuration: '1:00:00', // Durée des créneaux horaires
                slotLabelInterval: '1:00:00', // Intervalle des étiquettes de créneau horaire
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: true,
                    meridiem: 'short'
                }, // Format des étiquettes de créneau horaire
                slotMinTime:'00:00:00', // Heure de début de la plage de temps
                slotMaxTime:'24:00:00', // Heure de fin de la plage de temps
                //Evenements
                events: {!! json_encode($events) !!}, // Événements à afficher sur le calendrier
                displayEventTime: false, // Masquer l'heure de début des événements
            });
            calendar.render();
        });


    </script>
    <div id='calendar'></div>

    <div class="row mt-4">
        <div class="col-md-2 text-center border ">
            <h5>Légende :</h5>
            <ul class="p-0">
                <li class="bg-green"> 1 semaine</li>
                <li class="bg-red"> 1 Journée</li>
                <li class="bg-blue"> 1 Demi-Journée</li>
            </ul>
        </div>
    </div>
@endsection
