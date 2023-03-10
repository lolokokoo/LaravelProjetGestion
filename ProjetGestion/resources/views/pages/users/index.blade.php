@extends('layouts.master')

@section("contenu")
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Liste des utilisateurs</div>
            </div>
            <table class="table table-bordered table-striped" id="data-table" data-page-length='25' data-order='[[ 2, "asc" ]]'>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            var table = $('#data-table').DataTable({
                select: true,
                processing: true,
                serverSide: true,
                ordering:  true,
                searching: true,
                paging: true,
                ajax: table,
                scrollY: 300,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nom', name: 'nom'},
                    {data: 'prenom', name: 'prenom'},
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        render: function (data, type, row){
                            return moment(data).fromNow();
                        }
                    },
                    {
                        data: null,
                        width: '70px',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            // Ajoutez un bouton "Modifier et supprimer" qui redirige vers un formulaire de modification
                            return '<div class="text-center"><a class="text-decoration-none" href="{{ route('admin.users.edit', ['id' => '_id_']) }}"><i class="far fa-edit"></i></a>'.replace('_id_', row.id) + ' <a class="text-decoration-none" href="{{ route('admin.users.delete', ['id' => '_id_']) }}"><i class="far fa-trash-alt"></i></a></div>'.replace('_id_', row.id);
                        }
                    }
                ]
            });
        });
    </script>

@endsection
