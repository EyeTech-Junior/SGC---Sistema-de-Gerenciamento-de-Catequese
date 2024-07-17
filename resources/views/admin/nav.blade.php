<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="{{URL::asset('/img/bxs-user-circle.svg')}}" class="avatar img-fluid rounded" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{route("profile.editar")}}" class="dropdown-item">Perfil</a>
                    <a href="{{route('exit')}}" class="dropdown-item">Sair</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
