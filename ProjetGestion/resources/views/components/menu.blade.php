<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ setMenuActive('home') }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Accueil
                </p>
            </a>
        </li>

        @can("manager")
        <li class="nav-item {{ setMenuClass('manager.locations.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('manager.locations.', 'active') }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Tableau de bord
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('manager.locations.vueGlobale') }}" class="nav-link {{ setMenuClass('manager.locations.vueGlobale', 'active') }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Vue globale</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manager.locations.calendrier') }}" class="nav-link {{ setMenuClass('manager.locations.calendrier', 'active') }}{{ setMenuClass('manager.locations.show', 'active') }}">
                        <i class="nav-icon fas fa-swatchbook"></i>
                        <p>Locations</p>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can("admin")
        <li class="nav-item {{ setMenuClass('admin.users.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.users.', 'active') }}">
                <i class=" nav-icon fas fa-user-shield"></i>
                <p>
                    Habilitations
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ setMenuClass('admin.users.', 'active') }}">
                        <i class=" nav-icon fas fa-users-cog"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-fingerprint"></i>
                        <p>Roles et permissions</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{ setMenuClass('admin.typesarticles.', 'menu-open') }}{{ setMenuClass('admin.proprietetypearticle.', 'menu-open') }}{{ setMenuClass('admin.articles.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.proprietetypearticle.', 'active') }}{{ setMenuClass('admin.typesarticles.', 'active') }}{{ setMenuClass('admin.articles.', 'active') }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Gestion articles
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.typesarticles.index') }}"
                       class="nav-link {{ setMenuClass('admin.typesarticles.', 'active') }}{{ setMenuClass('admin.proprietetypearticle.', 'active') }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Type d'articles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=" {{ route('admin.articles.index') }}"
                       class="nav-link {{ setMenuClass('admin.articles.', 'active') }}">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Articles</p>
                    </a>
                </li>

            </ul>
        </li>
        @endcan

        @can('employe')
        <li class="nav-header">LOCATION</li>
        <li class="nav-item">
            <a href="" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Gestion des clients
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                    Gestion des locations
                </p>
            </a>
        </li>

        <li class="nav-header">CAISSE</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                    Gestion des paiements
                </p>
            </a>
        </li>
        @endcan
    </ul>
</nav>

