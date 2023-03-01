<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar top -->
    <x-topnav/>
    <!-- End navbar top -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light"><bold>YBLTD</bold></span>
        </a>
        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('img/profil.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ userFullName() }}</a>
                </div>
            </div>
            <!-- Menu on the left -->
            <x-menu/>
            <!-- End menu -->
        </div>
    </aside>

    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                @yield("contenu")
            </div>
        </div>
    </div>

    <!-- Right sidebar -->
    <x-sidebar/>
    <!-- End sidebar -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            TODO
        </div>
        <strong>Copyright &copy; 2023 Mano Raichon.</strong> All rights reserved.
    </footer>
</div>

<script src="{{ mix("js/app.js") }}"></script>
@livewireScripts
</body>
</html>
