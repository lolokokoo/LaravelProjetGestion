@extends('layouts.master')

@section("contenu")
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Toutes les locations</h5>
        </div>
        <div class="card-body">
            <table id="locations-table" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>Nom article</th>
                    <th>Type d'article</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Durée location</th>
                    <th>Client</th>
                    <th>Employé</th>
                    <th>Status location</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->article->nom }}</td>
                        <td>{{ $location->article->typeArticle->nom }}</td>
                        <td>{{ \Carbon\Carbon::parse($location->dateDebut)->locale('fr')->isoFormat('dddd D MMMM YYYY, HH:mm') }}</td>
                        <td>{{ \Carbon\Carbon::parse($location->dateFin)->locale('fr')->isoFormat('dddd D MMMM YYYY, HH:mm') }}</td>
                        <td>{{ $location->dureesLocation->libelle }}</td>
                        <td>{{ $location->client->nom . ' ' . $location->client->prenom }}</td>
                        <td>{{ $location->user->nom . ' ' . $location->user->prenom }}</td>
                        <td>{{ $location->statusLocation->nom }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <script>
                $(document).ready(function() {
                    $('#locations-table').DataTable({
                        "order": [[ 2, "asc" ]], // ordre initial des colonnes
                        "language": { // langage de la datatable
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        },
                        "columns": [ // spécification des colonnes
                            null,
                            null,
                            null,
                            null,
                            null,
                            { "orderable": false }, // colonne non triable
                            { "orderable": false },
                            null
                        ]
                    });
                });
            </script>

        </div>
    </div>
@endsection
