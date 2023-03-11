@extends('layouts.master')

@section("contenu")
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Récapitulatif location n°{{ $location->id }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
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
                </tbody>
            </table>
        </div>
    </div>

@endsection
