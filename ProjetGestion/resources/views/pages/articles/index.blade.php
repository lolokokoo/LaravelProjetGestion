@extends('layouts.master')

@section("contenu")
    <div class="mt-3 row">
        @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-3" style="min-height: 168px">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('img/articles/'.$article->imageUrl) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                                <p class="card-text">numero de série {{ $article->noSerie }}</p>
                                <p>
                                    @if($article->estDisponible)
                                        <span class="badge badge-success">Disponible </span>
                                    @else
                                        <span class="badge badge-danger">Non Disponible </span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
