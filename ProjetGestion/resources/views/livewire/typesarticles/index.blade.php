@extends('layouts.master')

@section("contenu")
    <div>
        <h1>Page utilisateurs</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row p-4 pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des types d'articles</h3>
                        <div class="card-tools d-flex align-items-center">
                            <a href="" class="btn btn-link text-white mr-4 d-block text-decoration-none"><i class="fas fa-user-plus"></i> Nouveau type d'article</a>
                            <div class="input-group input-group-md" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 50%;">Types d'article</th>
                                <th style="width: 20%;">Ajouté</th>
                                <th style="width: 30%;" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <div class="float-right pagination">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
