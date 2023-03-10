<aside class="control-sidebar control-sidebar-dark">
    <div class="bg-dark p-2">
        <div class="card-body bg-dark box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.jpg') }}" alt="User profile picture">
            </div>
            <h3 class="profile-username text-center ">{{ Str::limit( userFullName(), 19)  }}</h3>
            <p class="text-muted text-center">{{ getRolesName() }}</p>
            <ul class="list-group bg-dark mb-3">
                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center text-decoration-none"><i class="fa fa-lock pr-2"></i><b>Mot de passe</b></a>
                </li>
                <li class="list-group-item">
                    <a href="#" class="d-flex align-items-center text-decoration-none"><i class="fa fa-user pr-2"></i><b>Mon profile</b></a>
                </li>
            </ul>
            <a href="#">
                <form method="POST" action="{{ route('logout') }}" class="btn btn-primary btn-block">
                    @csrf
                    <x-dropdown-link :href="route('logout')" class="text-decoration-none"
                                     onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <b>Déconnexion</b>
                    </x-dropdown-link>
                </form>
            </a>
        </div>
    </div>
</aside>
