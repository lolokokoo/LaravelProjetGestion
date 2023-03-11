@extends('layouts.master')

@section("contenu")

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                //Style du callendar en général
                initialView: 'dayGridMonth',
                initialDate: '2023-01-01',
                finalDate: '2023-12-31',
                validRange: {
                    start: '2023-01-01',
                    end: '2023-12-31'
                },
                themeSystem: 'bootstrap5',
                buttonText: {
                    today: 'Aujourd\'hui',
                    month: 'Mois',
                    week: 'Semaine',
                    day: 'Jour',
                    list: 'Agenda'
                },
                customButtons: {
                    myCustomButton: {
                        text: 'Test Bouton',
                        className: 'btn btn-success',
                        click: function() {
                            alert('Alerte Test!');
                        }
                    }
                },
                headerToolbar: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 650,
                locale: 'fr',
                stickyHeaderDates: true,
                expandRows: true,
                weekends: true,
                dayHeaders: true,
                dayHeaderFormat: { weekday: 'short' },
                //Style week/day
                slotDuration: '3:00:00',
                slotLabelInterval: '6:00:00',
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: true,
                    meridiem: 'short'
                },
                slotMinTime:'06:00:00',
                slotMaxTime:'20:00:00',
                //Evenements
                events: {!! json_encode($events) !!},
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
