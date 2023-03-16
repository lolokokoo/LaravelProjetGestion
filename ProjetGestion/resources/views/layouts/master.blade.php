<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/fr.js'></script>

    <script src="https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini h-100">
<div class="row " style="min-height: 100%">
    <div class="col-lg-2 col-md-12 pr-0 mr-0 ">
        <aside class="sticky-top h-100 sidebar-dark-primary elevation-4 ml-0">
            <a href="index3.html" class="brand-link text-decoration-none">
                <span class="brand-text font-weight-light"><bold>Mano Locations</bold></span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/profil.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-decoration-none">{{ userFullName() }}</a>
                    </div>
                </div>
                <!-- Menu on the left -->
                <x-menu/>
                <!-- End menu -->
            </div>
        </aside>
    </div>
    <div class="col-lg-10 col-md-12 pl-0">
        <!-- Navbar top -->
        <x-topnav/>
        <!-- End navbar top -->

        <div class="container">
            <div class="container-fluid">
                @yield("contenu")
            </div>
        </div>
    </div>
</div>

<!-- Right sidebar -->
<x-sidebar/>
<!-- End sidebar -->

<footer class="main-footer ml-0 text-center position-relative">
    <div class="float-right d-none d-sm-inline">
        TODO
    </div>
    <strong>Copyright &copy; 2023 Mano Raichon.</strong> All rights reserved.
</footer>

<script src="{{ mix("js/app.js") }}"></script>
@livewireScripts
</body>
</html>
