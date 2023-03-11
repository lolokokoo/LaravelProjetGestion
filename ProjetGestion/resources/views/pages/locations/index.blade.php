@extends('layouts.master')

@section("contenu")

    <script>
        let locations = []
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                height: 650,
                locale: 'fr',
                stickyHeaderDates: true,
                expandRows: true,
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
                events: {!! json_encode($events) !!}
            });
            calendar.render();
        });

    </script>
    <div id='calendar'></div>
@endsection
