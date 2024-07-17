<div id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="sidebar-content">
        <div class="sidebar-logo">
            <a href="{{route("dashboard")}}">Paróquia Sant'Ana</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{route('student.list')}}" class="sidebar-link {{ (request()->is('student*')) ? 'active' : '' }}" id="alunos-item">
                    <i class="fa-solid fa-user"></i>
                    Alunos
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('coordinator.list')}}" class="sidebar-link {{ (request()->is('coordinator*')) ? 'active' : '' }}" id="coordenadores-item">
                    <i class="fa-solid fa-user-pen"></i>
                    Coordenadores
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('classroom.list')}}" class="sidebar-link {{ (request()->is('classroom*')) ? 'active' : '' }}" id="turmas-item">
                    <i class="fa-solid fa-book"></i>
                    Turmas
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('category.index')}}" class="sidebar-link {{ (request()->is('category*')) ? 'active' : '' }}" id="categories-item">
                    <i class="fa-solid fa-address-book"></i>
                    Categorias
                </a>
            </li>
        </ul>
    </div>
</div>
